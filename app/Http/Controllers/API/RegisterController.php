<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UsuarioResource;



class RegisterController extends BaseController
{




     public function getUsuarios()
     {
         $usuarios = User::get();

         return $this->sendResponse(UsuarioResource::collection($usuarios), 'Usuarios retrieved successfully.');
     }





}
