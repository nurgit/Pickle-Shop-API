<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\JsonResource;
class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'weight'=>$this->weight,
            'test'=>$this->test,
            'detail'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock==0 ?'Out Of Stock' :$this->stock ,
            'href'=>[
                'link'=>route('products.show',$this->id)
            ]
        ];
    }
}
