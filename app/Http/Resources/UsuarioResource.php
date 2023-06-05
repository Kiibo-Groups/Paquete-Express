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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'rfc_fiscal' => $this->rc_fiscal,
            'calle_fiscal' => $this->calle_fiscal,
            'numero_interior' => $this->numero_interior,
            'numero_exterior' => $this->numero_exterior,
            'colonia_fiscal' => $this->colonia_fiscal,
            'codigo_postal_Pago' => $this->codigo_postal,
            'localidad_fiscal' => $this->localidad_fiscal,
            'regimen_fiscal' => $this->regimen_fiscal,
            'referencia_direccion' => $this->referencia_direccion,
            'clave_pais_sat' => $this->clave_pais,
            'forma_pago_sat' => $this->forma_pago_sat,
            'nombre_comercial' => $this->ship_company,
            'referencia_direccion_envio' => $this->referencia_direccion_envio,
            'ship_address1' => $this->ship_address1,
            'codigo_postal_envio' => $this->ship_zip,
            'colonia_envio' => $this->colonia_envio,
            'localidad_envio' => $this->localidad_envio,
            'municipio_envio' => $this->municipio_envio,
            'estado_envio' => $this->estado_envio,
            'pais_envio' => $this->ship_country,
            //'referencia_pedido_en_ecommerce' => $this->transaction_number,
            //'fecha_pedido' => $this->created_at->format('M d, Y'),
            //'pedido' => $this->cart,
        ];
    }
}
