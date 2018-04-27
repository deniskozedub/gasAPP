<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DriverAddRequest;
use App\Http\Resources\DriverCollection;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use App\Models\Driverimage;
use http\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');

    }


    public function index()
    {
        return DriverCollection::collection(Driver::all());
    }

    public function show(Driver $driver)
    {
        return new DriverResource($driver);
    }

    public function destroy (Driver $driver)
    {
           $driver->delete();
           return response("DELETE", 204);
    }

    public function store(DriverAddRequest $request)
    {
        $ext         = explode("/", $request->image->getClientMimeType());
        $ext         = end($ext);
        $name        = time() . '_' . md5($request->image->getClientOriginalName()) . ".{$ext}";
        $request->image->move(public_path('image_drivers'), $name);
        $image       = new Driverimage();
        $image->url  = $name;
        $image->save();


        $driver = new Driver();
        $driver->name           = $request->name;
        $driver->surname        = $request->surname;
        $driver->password       = md5($request->pass);
        $driver->phone          = $request->phone;
        $driver->email          = $request->email;
        $driver->driver_license = $image->id;
        $driver->save();

        return response([
            'data' => new DriverResource($driver)
        ],201);
    }

    public function update(Request $request, Driver $driver)
    {
        $driver->update($request->all());
        return response('UPDATE',200);
    }


}
