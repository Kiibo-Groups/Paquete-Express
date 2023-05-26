<?php

namespace App\Http\Controllers\API;

use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UsuarioResource;
use App\Http\Resources\ArticulosResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class RegisterController extends BaseController
{




     public function getUsuarios()
     {
        // $usuarios = User::latest()->get();
         $order    = Order::latest('id')->whereOrderStatus('Pending')->get();

         return $this->sendResponse(UsuarioResource::collection($order), 'Usuarios retrieved successfully.');
     }


     public function getArticulos()
     {
         $articulos = Item::get();

         return $this->sendArticulosResponse(ArticulosResource::collection($articulos), 'Artículos retrieved successfully.');
     }

     public function getArticuloVer($sku)
     {
         $articulos = Item::where('sku', $sku)->get();

         return $this->sendArticulosResponse(ArticulosResource::collection($articulos), 'Artículo retrieved successfully.');
     }





}
