<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class OrderCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'link'              => [
                'href'          => route('orders.show',$this->id)
            ],
            'name'              => $this->name,
            'car_on_order'      => $this->orderCar->model,
            'zipcode_on_order'  => $this->orderZipCode->zipcode,
            'time_on_order'     => $this->created_at
        ];
    }
}
