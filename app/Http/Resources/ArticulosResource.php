<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticulosResource extends JsonResource
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
        return [
            'ID' => $this->id,
            'SKU' => $this->sku,
            'Existencia' => $this->stock,
            'Discount_price' => $this->discount_price,
            'Previous_price' => $this->previous_price,
            'Descripcion_Producto' => $this->name,


        ];
    }
}
