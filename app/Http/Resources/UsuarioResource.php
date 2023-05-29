<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->user->first_name,
            'last_name' => $this->user->last_name,
            'email' => $this->user->email,
            'phone' => $this->user->phone,
            'rfc_fiscal' => $this->user->rc_fiscal,
            'calle_fiscal' => $this->user->calle_fiscal,
            'numero_interior' => $this->user->numero_interior,
            'numero_exterior' => $this->user->numero_exterior,
            'colonia_fiscal' => $this->user->colonia_fiscal,
            'codigo_postal_Pago' => $this->user->codigo_postal,
            'localidad_fiscal' => $this->user->localidad_fiscal,
            'regimen_fiscal' => $this->user->regimen_fiscal,
            'referencia_direccion' => $this->user->referencia_direccion,
            'clave_pais_sat' => $this->user->clave_pais,
            'forma_pago_sat' => $this->user->forma_pago_sat,
            'nombre_comercial' => $this->user->ship_company,
            'referencia_direccion_envio' => $this->user->referencia_direccion_envio,
            'ship_address1' => $this->user->ship_address1,
            'codigo_postal_envio' => $this->user->ship_zip,
            'colonia_envio' => $this->user->colonia_envio,
            'localidad_envio' => $this->user->localidad_envio,
            'municipio_envio' => $this->user->municipio_envio,
            'estado_envio' => $this->user->estado_envio,
            'pais_envio' => $this->user->ship_country,
            //'referencia_pedido_en_ecommerce' => $this->transaction_number,
            //'fecha_pedido' => $this->created_at->format('M d, Y'),
            //'pedido' => $this->cart,
        ];
    }
}
