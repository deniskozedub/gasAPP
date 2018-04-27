<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class DriverCollection extends Resource
{

    public function toArray($request)
    {
        return [
            'href'      => [
             'link'     => route('drivers.show',$this->id)
            ],
            'id'        => $this->getDriver->id,
            'name'      => $this->getDriver->name,
            'surname'   => $this->getDriver->surname,
            'phone'     => $this->getDriver->phone,
            'password'  => $this->getDriver->password,
            'email'     => $this->getDriver->email,
            'lisence'   => $this->imageDriver
        ];
    }
}
