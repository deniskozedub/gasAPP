<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
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
         "id"               => $this->getDriver->id,
         "name"             => $this->getDriver->name,
         "surname"          => $this->getDriver->surname,
         "password"         => $this->getDriver->password,
         "email"            => $this->getDriver->email,
         "phone"            => $this->getDriver->phone,
         "driver_license"   => $this->imageDriver
        ];
    }
}
