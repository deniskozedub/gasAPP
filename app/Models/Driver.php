<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function imageDriver(){

        return $this->belongsTo("App\Models\Driverimage","driver_license","id","driverimages");
    }
}
