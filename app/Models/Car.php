<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable =[
         'model','driver_id', 'plate_license'
        ];

    public function imageCar(){

        return $this->belongsTo("App\Models\Carimage","plate_license","id","carimages");
    }

    public function driver()
    {
        return $this->belongsTo("App\Models\Driver");
    }


}
