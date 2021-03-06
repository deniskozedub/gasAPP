<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CarCollection extends Resource
{

    public function toArray($request)
    {
        return [
            ['href' => [
                'link' => route('cars.show', $this->id)
            ],
                'id'    => $this->id,
                'model' => $this->model,
                'driver' => $this->driver->getDriver,
                'lisence' => $this->imageCar,

            ]
        ];
    }

}
