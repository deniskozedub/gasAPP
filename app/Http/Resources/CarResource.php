<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'id'             => $this->id,
            'model'          => $this->model,
            'driver_name'    => $this->driver->getDriver->name,
            'lisence_url'    => $this->imageCar,
        ];
    }
}
