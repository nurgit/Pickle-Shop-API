<?php

namespace App\Http\Resources\Product;

use App\Models\Model\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'weight'=>$this->weight,
            'test'=>$this->test,
            'detail'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock==0 ?'Out Of Stock' :$this->stock ,

            'hrer' =>[

            ],

        ];
    }
}
