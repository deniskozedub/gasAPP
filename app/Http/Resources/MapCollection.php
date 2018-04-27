<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MapCollection extends Resource
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
            'id'      => $this->id,
            'zipcode' => $this->zipcode,
            'href'    => [
                'link'=> route('maps.show',$this->id)
            ]
        ];
    }


}