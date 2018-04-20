<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderCar()
    {
        return $this->belongsTo("App\Models\Car","car_id");
    }
    public function orderZipCode()
    {
        return $this->belongsTo("App\Models\Map","map_id");
    }

    protected $fillable = [
        'name', 'map_id', 'car_id',
    ];
}
