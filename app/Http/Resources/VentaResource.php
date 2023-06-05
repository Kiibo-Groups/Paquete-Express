<?php

namespace App\Http\Resources;

use App\Helpers\PriceHelper;
use Illuminate\Http\Resources\Json\JsonResource;

class VentaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        //dd($this);

        $prod = [];
        foreach (json_decode($this->cart,true) as $item){
            $prod[] = array(
                'producto'=>$item['name'],
                'Cantidad_Vendida '=> $item['qty'],
                'precio_pactado'=> $item['price'],

            );
        };
        //dd($prod);
        $discount = json_decode($this->discount,true);
        if ($discount) {
            $descuento = $discount['code']['discount'];
        } else {
            $descuento = 0;
        }

        $state = json_decode($this->state,true);
        if ($state) {
            $iva = $state['price'];
        } else {
            $iva = 0;
        }

        return [
            //'ID' => $this->id,
            'Referencia_pedido_en_ecommerce' => $this->transaction_number,
            'Serie_pedido' => $this->transaction_number,
            'Folio_pedido' => $this->transaction_number,
            'Fecha_pedido' => $this->created_at->format('d-m-Y'),
            'RFC_cliente ' => $this->user->rc_fiscal,
            'Forma_pago_SAT' => $this->user->forma_pago_sat,
            'Clave_SAT' => $this->user->clave_pais,
            'Descuento_Pactado_en_%' => $descuento,
            'IVA' => $iva,
            'Total' => PriceHelper::OrderTotal($this),


            'Productos' => $prod,


        ];
    }
}
