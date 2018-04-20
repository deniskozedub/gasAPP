<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DriverCollection extends Resource
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
            'href'      => [
             'link'     => route('drivers.show',$this->id)
            ],
            'name'      => $this->name,
            'surname'   => $this->surname,
            'phone'     => $this->phone,
            'email'     => $this->email,
            'lisence'   => $this->imageDriver
        ];
    }
}
