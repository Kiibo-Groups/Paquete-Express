<?php

namespace App\Traits;

use App\{
    Models\Setting,
    Models\PromoCode,
    Models\TrackOrder,
    Helpers\EmailHelper,
    Helpers\PriceHelper,
    Models\Notification,
    Models\PaymentSetting,
};
use App\Helpers\SmsHelper;
use App\Models\Item;
use App\Models\Order;
use App\Models\ShippingService;
use App\Models\State;
use Illuminate\Support\Str;

use Cartalyst\Stripe\{
    Laravel\Facades\Stripe,
    Exception\CardErrorException,
    Exception\MissingParameterException
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

//use function GuzzleHttp\json_decode;
use Illuminate\Support\Facades\Http;

trait StripeCheckout
{

    public function __construct()
    {
        $data = PaymentSetting::whereUniqueKeyword('stripe')->first();
        $paydata = $data->convertJsonData();
        Config::set('services.stripe.key', $paydata['key']);
        Config::set('services.stripe.secret', $paydata['secret']);
    }

    public function stripeSubmit($data)
    {
        $user    = Auth::user();
        $setting = Setting::first();
        $cart    = Session::get('cart');

        $total_tax    = 0;
        $cart_total   = 0;
        $total        = 0;
        $option_price = 0;

        $prod = [];
        foreach ($cart as $key => $item) {

            $total += $item['main_price'] * $item['qty'];
            $option_price += $item['attribute_price'];
            $cart_total = $total + $option_price;
            $item = Item::findOrFail($key);
            if ($item->tax) {
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

        // ----------- createOrder -----------------------------


        $shipping = Session::get('shipping_address')['precio_shipp'];

        $discount = [];
        if (Session::has('coupon')) {
            $discount = Session::get('coupon');
        }

        if (!PriceHelper::Digital()) {
            $shipping = null;
        }

        $orderData['state'] =  $data['state_id'] ? json_encode(State::findOrFail($data['state_id']), true) : null;
        $grand_total        = ($cart_total + ($shipping ?: 0)) + $total_tax;
        $grand_total = $grand_total - ($discount ? $discount['discount'] : 0);
        $grand_total += PriceHelper::StatePrce($data['state_id'], $cart_total);
        $total_amount = PriceHelper::setConvertPrice($grand_total);

        $orderData['cart'] = json_encode($cart, true);
        $orderData['discount'] = json_encode($discount, true);
        $orderData['shipping'] = json_encode($shipping, true);
        $orderData['tax'] = $total_tax;
        $orderData['state_price'] = PriceHelper::StatePrce($data['state_id'], $cart_total);
        $orderData['shipping_info'] = json_encode(Session::get('shipping_address'), true);
        $orderData['billing_info'] = json_encode(Session::get('billing_address'), true);
        $orderData['payment_method'] = 'Stripe';
        $orderData['user_id'] = isset($user) ? $user->id : 0;
        $orderData['transaction_number'] = Str::random(10);
        $orderData['currency_sign'] = PriceHelper::setCurrencySign();
        $orderData['currency_value'] = PriceHelper::setCurrencyValue();
        $orderData['order_status'] = 'Pending';


        $stripe = Stripe::make(Config::get('services.stripe.secret'));
        try {

            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $data['card'],
                    'exp_month' => $data['month'],
                    'exp_year' => $data['year'],
                    'cvc' => $data['cvc'],
                ],
            ]);
            if (!isset($token['id'])) {
                return [
                    'status' => false,
                    'message' => __('Token Problem With Your Token.')
                ];
            }


            $charge = $stripe->charges()->create([
                'card' => $token['id'],
                'currency' => PriceHelper::setCurrencyName(),
                'amount' => $total_amount,
                'description' => __('Payment via stripe from') . ' ' . $setting->title,
            ]);

            if ($charge['status'] == 'succeeded') {

                $orderData['txnid'] =  $charge['balance_transaction'];
                $orderData['charge_id'] = $charge['id'];
                $orderData['payment_status'] = 'Paid';


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
                        "property"              => $ship['ship_address1'],
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

                $orderData['orderKey'] = $orderKey;
                //----------------------Fin----------------------------------------------------------

                $order = Order::create($orderData);

                //------------------------------------------------------------------

                PriceHelper::Transaction($order->id, $order->transaction_number, EmailHelper::getEmail(), PriceHelper::OrderTotal($order, 'trns'));
                PriceHelper::LicenseQtyDecrese($cart);
                PriceHelper::LicenseQtyDecrese($cart);

                if (Session::has('copon')) {
                    $code = PromoCode::find(Session::get('copon')['code']['id']);
                    $code->no_of_times--;
                    $code->update();
                }
                TrackOrder::create([
                    'title' => 'Pending',
                    'order_id' => $order->id,
                ]);


                Notification::create([
                    'order_id' => $order->id
                ]);

                if ($setting->is_twilio == 1) {
                    // message
                    $sms = new SmsHelper();
                    $user_number = json_decode($order->billing_info, true)['bill_phone'];
                    if ($user_number) {
                        $sms->SendSms($user_number, "'purchase'", $order->transaction_number);
                    }
                }

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

                if ($discount) {
                    $coupon_id = $discount['code']['id'];
                    $get_coupon = PromoCode::findOrFail($coupon_id);
                    $get_coupon->no_of_times -= 1;
                    $get_coupon->update();
                }

                Session::put('order_id', $order->id);
                Session::forget('cart');
                Session::forget('discount');
                Session::forget('coupon');
                return [
                    'status' => true
                ];
            }
        } catch (Exception $e) {

            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        } catch (CardErrorException $e) {

            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        } catch (MissingParameterException $e) {

            return [
                'status' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
