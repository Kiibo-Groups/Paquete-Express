<?php

namespace App\Traits;

use App\{
    Models\Order,
    Models\Setting,
    Models\TrackOrder,
    Helpers\EmailHelper,
    Helpers\PriceHelper,
    Models\Notification,
};
use App\Helpers\SmsHelper;
use App\Models\Item;
use App\Models\PromoCode;
use App\Models\ShippingService;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

trait CashOnDeliveryCheckout
{

    public function cashOnDeliverySubmit($data){
        $user = Auth::user();

        $setting = Setting::first();
        $cart = Session::get('cart');
        $total_tax = 0;
        $cart_total = 0;
        $total = 0;
        $option_price = 0;
        $prod = [];
        foreach($cart as $key => $item){

            $total += $item['main_price'] * $item['qty'];
            $option_price += $item['attribute_price'];
            $cart_total = $total + $option_price;
            $item = Item::findOrFail($key);
            if($item->tax){
                $total_tax += $item::taxCalculate($item);
            }
            $content = $item['name'];
            $prod[] = array(
                'nombre'=>$item['name'],
                'alto '=> $item['alto'],
                'ancho'=> $item['ancho'],
                'largo'=> $item['largo'],

            );
        }
        // ----------- createOrder
        $shipping = Session::get('shipping_address')['precio_shipp'];

        if (!PriceHelper::Digital()){
            $shipping = null;
        }

        $discount = [];
        if(Session::has('coupon')){
            $discount = Session::get('coupon');
        }
        $grand_total = ($cart_total + ($shipping?$shipping:0)) + $total_tax;
        $grand_total = $grand_total - ($discount ? $discount['discount'] : 0);
        $grand_total += PriceHelper::StatePrce($data['state_id'],$cart_total);
        $total_amount = PriceHelper::setConvertPrice($grand_total);
        $orderData['state'] =  $data['state_id'] ? json_encode(State::findOrFail($data['state_id']),true) : null;
        $orderData['cart'] = json_encode($cart,true);
        $orderData['discount'] = json_encode($discount,true);
        $orderData['shipping'] = json_encode($shipping,true);
        $orderData['tax'] = $total_tax;
        $orderData['state_price'] = PriceHelper::StatePrce($data['state_id'],$cart_total);
        $orderData['shipping_info'] = json_encode(Session::get('shipping_address'),true);
        $orderData['billing_info'] = json_encode(Session::get('billing_address'),true);
        $orderData['payment_method'] = 'Cash On Delivery';
        $orderData['user_id'] = isset($user) ? $user->id : 0;
        $orderData['transaction_number'] = Str::random(10);
        $orderData['currency_sign'] = PriceHelper::setCurrencySign();
        $orderData['currency_value'] = PriceHelper::setCurrencyValue();
        $orderData['payment_status'] = 'Unpaid';
        $orderData['order_status'] = 'Pending';

           //  ---------------------- createOrder ------------------------

           $ship = Session::get('shipping_address');
           $user = Auth::user();
           $setting          = Setting::first();
           $token_express    = $setting->token_paqexpress;
           $url              = 'https://qa.paquetelleguexpress.com/api/v1/client/createOrder';
           $parameters       = [
               "rateToken" => Session::get('shipping_address')['rateToken'],
               "producto" => $prod,
               "peso_volumetrico"  => $ship['pvolum'],
               "content"   => [
                   "content"        => $content,
                   "insurance"      => false,
                   "declared_value" => 0
               ],
               "origin" => [
                   "company"               => $setting->title,
                   "name"                  => $setting->title,
                   "lastname"              => $setting->title,
                   "email"                 => $setting->footer_email,
                   "phone"                 => $setting->footer_phone,
                   "property"              => "Corporativo",
                   "street"                => $setting->footer_address,
                   "outdoor"               => "",
                   "interior"              => null,
                   "location"              => $setting->footer_address,
                   "reference"             => $setting->footer_address,
                   "settlement_type_code"  => "001",
                   "road_type_code"        => "009"
               ],
               "destination" => [
                   "company"               => $ship['ship_company'],
                   "name"                  => $ship['ship_first_name'],
                   "lastname"              => $ship['ship_last_name'],
                   "email"                 => $ship['ship_email'],
                   "phone"                 => $ship['ship_phone'],
                   "property"              => 'Corporativo',
                   "street"                => $user->calle_fiscal,
                   "outdoor"               => $user->numero_exterior,
                   "interior"              => $user->numero_interior,
                   "location"              => $user->localidad_envio,
                   "reference"             => $user->referencia_direccion_envio,
                   "settlement_type_code"  => "001",
                   "road_type_code"        => "009"
               ]
           ];

           $response = Http::withToken($token_express)->post($url, $parameters);
           $data1    = json_decode($response);

           $orderKey = $data1->orderKey;
            //    {
            //     "_token":"DEdJBMUJj3GnOoVz86AfeNQB3pkoapGA19WLu3J3",
            //     "ship_first_name":"Mateo",
            //     "ship_last_name":"QC",
            //     "ship_email":"mateo@a.com",
            //     "ship_phone":"312 232 4521",
            //     "ship_zip":"65650",
            //     "ship_city":"B2CyIvUhfm",
            //     "ship_company":"Company",
            //     "ship_address1":"Address 1 *",
            //     "ship_address2":null,
            //     "ship_country":"Mexico",
            //     "peso":"12",
            //     "alto":"50",
            //     "ancho":"50",
            //     "largo":"25",
            //     "pvolum":"12.5",
            //     "transporte":"UPS Express Saver",
            //     "precio_shipp":"2646.24",
            //     "rateToken":"18011686751453596NKdIh14v4P",
            //     "entrega":"Compromiso de entrega 1 d\u00eda laboral, entrega antes del final del d\u00eda"
            //     }
           $orderData['orderKey'] = $orderKey;
        //----------------------Fin----------------------------------------------------------
        $order = Order::create($orderData);
        TrackOrder::create([
            'title' => 'Pending',
            'order_id' => $order->id,
        ]);

        //---------------------- SEND WEBHOOK ----------------------------------------------------------
        $lims_data_webhook['Pedido'] = array ( 
            "Referencia_pedido_en_ecommerce_rateToken" => $token_express, ///int irrepetible   //requerido
            "Serie_pedido" => $orderKey, //varchar     
            "Folio_pedido" => $orderKey, //varchar
            "Fecha_pedido" => $order->created_at, //varchar
            "RFC_cliente" => $user->rfc_fiscal, //varchar
            "Forma_pago_SAT" => $user->forma_pago_sat, //varchar
            "Clave_SAT" => $user->clave_pais, //varchar
            "Descuento_Pactado" => ($discount ? $discount['discount'] : 0), //varchar
            "IVA" => $order->state_price, //varchar
            "Total" => PriceHelper::OrderTotal($order,'trns'), //varchar
            "Fecha_estimada_entrega" => $ship['entrega'], //varchar
        );																
    
        $lims_data_webhook['Producto'][] =  $prod;										
        
        // codificar en formato JSON
        $json_webhook = json_encode($lims_data_webhook);
        // opciones de la petición curl
        $options_webhook = array(
            CURLOPT_URL => 'http://200.52.80.60/dashboard/api/webhook_ventas.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $json_webhook,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Content-Length: 1'
            )
        );

        // inicializar curl
        $curl_webhook = curl_init();
        curl_setopt_array($curl_webhook, $options_webhook);

        // ejecutar la petición curl
        $response = curl_exec($curl_webhook);
        $msg      = "";

        if ($response == 200) {
            $msg = "La entrega del JSON al Webhook fue exitosa";
        } else {
            $msg = "Hubo un problema al entregar el JSON al WebHook";
        }
        // cerrar curl
        curl_close($curl_webhook);
        		
        
        //---------------------- /SEND WEBHOOK ----------------------------------------------------------
        


        PriceHelper::Transaction($order->id,$order->transaction_number,EmailHelper::getEmail(),PriceHelper::OrderTotal($order,'trns'));
        PriceHelper::LicenseQtyDecrese($cart);
        PriceHelper::stockDecrese();
        Notification::create([
            'order_id' => $order->id
        ]);

        $emailData = [
            'to' => EmailHelper::getEmail(),
            'type' => "Order",
            'user_name' => isset($user) ? $user->displayName() : Session::get('billing_address')['bill_first_name'],
            'order_cost' => $total_amount,
            'transaction_number' => $order->transaction_number,
            'site_title' => Setting::first()->title,
        ];

        $email = new EmailHelper();
        $email->sendTemplateMail($emailData);

        if($discount){
            $coupon_id = $discount['code']['id'];
            $get_coupon = PromoCode::findOrFail($coupon_id);
            $get_coupon->no_of_times -= 1;
            $get_coupon->update();
        }
        if($setting->is_twilio == 1){
            // message
            $sms = new SmsHelper();
            $user_number = json_decode($order->billing_info,true)['bill_phone'];
            if($user_number){
                $sms->SendSms($user_number,"'purchase'",$order->transaction_number);
            }
        }

        Session::put('order_id',$order->id);
        Session::forget('cart');
        Session::forget('discount');
        Session::forget('coupon');
        return [
            'status' => true
        ];
    }

}
