<?php

namespace App\Repositories\Front;

use App\{
    Models\User,
    Models\Setting,
    Helpers\EmailHelper,
    Models\Notification
};
use App\Helpers\ImageHelper;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserRepository
{

    public function register($request){
        $input = $request->all();

        $user = new User;
        $input['password'] = bcrypt($request['password']);
        $input['email'] = $input['email'];
        $input['first_name'] = $input['first_name'];
        $input['last_name'] = $input['last_name'];
        $input['phone'] = $input['phone'];
        $verify = Str::random(6);
        $input['email_token'] = $verify;
        $user->fill($input)->save();
    
        Notification::create(['user_id' => $user->id]);

        $emailData = [
            'to' => $user->email,
            'type' => "Registration",
            'user_name' => $user->displayName(),
            'order_cost' => '',
            'transaction_number' => '',
            'site_title' => Setting::first()->title,
        ];

        $email = new EmailHelper();
        $email->sendTemplateMail($emailData);

    }
 

    public function profileUpdate($request){
        $input = $request->all();
        if($request['user_id']){
            $user = User::findOrFail($request['user_id']);
        }else{
            $user = Auth::user();
        }


        if($request->password){
            $input['password'] = bcrypt($input['password']);
            $user->password = $input['password'];
            $user->update();
        }


        if ($file = $request->file('photo')) {
            $input['photo'] = ImageHelper::handleUpdatedUploadedImage($file,'/assets/images',$user,'/assets/images/','photo');
        }

        if($request->newsletter){
            if(!Subscriber::where('email',$user->email)->exists()){
                Subscriber::insert([
                    'email' => $user->email
                ]);
            }
        }else{
            Subscriber::where('email',$user->email)->delete();
        }

        //---------------------- SEND WEBHOOK ----------------------------------------------------------
        $lims_data_userWebhook['Usuario'] = array ( 
            "id" => $user->id, ///int irrepetible   //requerido
            "first_name" => $user->first_name, //varchar     
            "last_name" => $user->last_name, //varchar
            "email" => $user->email, //varchar
            "phone" => $user->phone, //varchar
            "rc_fiscal" => $user->rc_fiscal, //varchar
            "calle_fiscal" => $user->calle_fiscal, //varchar
            "numero_interior" => $user->numero_interior, //varchar
            "numero_exterior" => $user->numero_exterior, //varchar
            "colonia_fiscal" => $user->colonia_fiscal, //varchar
            "codigo_postal_Pago" => "null", //varchar
            "localidad_fiscal" => $user->localidad_fiscal, //varchar
            "regimen_fiscal" => $user->regimen_fiscal, //varchar
            "referencia_direccion" => $user->referencia_direccion, //varchar
            "clave_pais" => $user->clave_pais, //varchar
            "forma_pago_sat" => $user->forma_pago_sat, //varchar
            "referencia_direccion_envio" => $user->referencia_direccion_envio, //varchar
            "ship_address1" => $user->ship_address1, //varchar
            "codigo_postal_envio" => "null", //varchar
        );																
                
        // codificar en formato JSON
	    $json_webhook = json_encode($lims_data_userWebhook);
        
        // opciones de la petición curl
        $options_webhook = array(
            CURLOPT_URL => 'http://200.52.80.60/dashboard/api/webhook_usuarios.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $json_webhook,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json_webhook)
            )
        );

        // inicializar curl
        $curl_webhook = curl_init();
        curl_setopt_array($curl_webhook, $options_webhook);

        // ejecutar la petición curl
        $response = curl_exec($curl_webhook);
        $msg = "";
        if ($response == 200) {
            $msg = "La entrega del JSON al Webhook fue exitosa";
        } else {
            $msg = "Hubo un problema al entregar el JSON al Webhook";
        }

        // cerrar curl
        curl_close($curl_webhook);
        //---------------------- SEND WEBHOOK ----------------------------------------------------------
    

        $user->fill($input)->save();
    }




}
