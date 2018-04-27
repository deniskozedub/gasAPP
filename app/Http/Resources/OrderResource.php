<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'name'              => $this->name,
            'car_on_order'      => $this->orderCar->model,
            'zipcode_on_order'  => $this->orderZipCode->zipcode,
            'time_on_order'     => $this->created_at
        ];
    }
}
