<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CarAddRequest;
use App\Http\Resources\CarCollection;
use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Models\Carimage;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }
    public function index()
    {
        return CarCollection::collection(Car::all());
    }

    public function show(Car $car)
    {
        return new CarResource($car);
    }

    public function destroy (Car $car)
    {
        $car->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function store(CarAddRequest $request)
    {
        $ext         = explode("/", $request->image->getClientMimeType());
        $ext         = end($ext);
        $name        = time() . '_' . md5($request->image->getClientOriginalName()) . ".{$ext}";
        $request->image->move(public_path('image_cars'), $name);
        $image       = new Carimage();
        $image->url  = $name;
        $image->name = $request->model.'_'.$request->driver;
        $image->save();


        $car = new Car();
        $car->model         = $request->model;
        $car->driver_id     = $request->driver;
        $car->plate_license = $image->id;
        $car->save();

        return response([
            'data' => new CarResource($car)
        ],Response::HTTP_CREATED);

    }

    public function update(Request $request, Car $car)
    {
       $car->update($request->all());
    }
}
