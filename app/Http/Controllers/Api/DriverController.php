<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\DriverCollection;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    public function index()
    {
        return DriverCollection::collection(Driver::all());
    }

    public function show(Driver $driver)
    {
        return new DriverResource($driver);
    }
}
