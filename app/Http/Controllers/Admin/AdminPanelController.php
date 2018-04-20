<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CarAddRequest;
use App\Http\Requests\DriverAddRequest;
use App\Http\Requests\MapAddRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Car;
use App\Models\Carimage;
use App\Models\Driver;
use App\Models\Driverimage;
use App\Models\Map;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Passport\HasApiTokens, Illuminate\Notifications\Notifiable;

class AdminPanelController extends Controller
{
    //------------------------------------head page on adminpanel--------------------------------//

    public function index()
    {
        return view('admin/headpage/index');
    }


    //--------------------------------car action---------------------------//

    public function cars()
    {
         return view('admin/cars/car');
    }

    public function carsAll()
    {
        return view('admin/cars/car_all')->with([
            'cars' => Car::latest('id')->paginate(5)
        ]);
    }

    public function carsAdd()
    {
        return view('admin/cars/car_add')->with([
            'drivers' => Driver::all()
        ]);
    }

    public function carsAddHandler(CarAddRequest $request)
    {
        //dd($request->image->getClientOriginalName());

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
        return redirect('/admin/carsall');


    }

    public function carsDeleteHandler($id)
    {
        $car = Car::find($id);
        if(file_exists(public_path("image_cars/{$car->imageCar->url}"))){
            unlink(public_path("image_cars/{$car->imageCar->url}"));
        }
        $image = $car->imageCar;
        $car->delete();
        $image->delete();
        return redirect()->back();
    }


    public function carsEdit($id)
    {
        $car = Car::find($id);
        return view('admin/cars/car_edit')->with([
            'car'        => $car,
            'drivers'    => Driver::all()
        ]);
    }


    public function carsEditHandler(Request $request)
    {
        //dd($request->all());

        $car = Car::find($request->id);
        $car::where('id', $request->id)->update(['driver_id' => $request->driver]);
        $car->model   = $request->name;
        $car->save();
        return redirect('admin/carsall');
    }


    //-------------------------------------- driver action ----------------------------//


    public function drivers()
    {
        return view('admin/drivers/driver');
    }


    public function driversAll()
    {
        return view('admin/drivers/driver_all')->with([
            'drivers' => Driver::latest('id')->paginate(5)
        ]);

        //return  response()->json(Driver::all());
    }


    public function driversAdd()
    {
        return view('admin/drivers/driver_add');
    }


    public function driversAddHandler(DriverAddRequest $request)
    {
        //dd($request->all());

        $ext         = explode("/", $request->image->getClientMimeType());
        $ext         = end($ext);
        $name        = time() . '_' . md5($request->image->getClientOriginalName()) . ".{$ext}";
        $request->image->move(public_path('image_drivers'), $name);
        $image       = new Driverimage();
        $image->url  = $name;
        $image->name = $request->name;
        $image->save();


        $driver = new Driver();
        $driver->name           = $request->name;
        $driver->surname        = $request->surname;
        $driver->password       = md5($request->pass);
        $driver->phone          = $request->phone;
        $driver->email          = $request->email;
        $driver->driver_license = $image->id;
        $driver->save();
        return redirect('admin/driversall');
    }


    public function driversDeleteHandler($id)
    {
        $driver = Driver::find($id);
        if(file_exists(public_path("image_drivers/{$driver->imageDriver->url}"))){
            unlink(public_path("image_drivers/{$driver->imageDriver->url}"));
        }
        $image = $driver->imageDriver;
        $driver->delete();
        $image->delete();
        return redirect()->back();

    }

    public function driversEdit($id)
    {
        $driver = Driver::find($id);
        return view('admin/drivers/driver_edit')->with([
            'driver' => $driver
        ]);
    }

    public function driversEditHandler(Request $request)
    {
        $driver          = Driver::find($request->id);
        $driver->name    = $request->name;
        $driver->surname = $request->surname;
        $driver->phone   = $request->phone;
        $driver->save();
        return redirect('admin/driversall');
    }


    //--------------------------------maps action--------------------------------//

    public function maps()
    {
        return view('admin/maps/map');
    }

    public function mapsAll()
    {
        return view('admin/maps/map_all')->with([
            'maps' => Map::latest('id')->paginate(5)
        ]);
    }

    public function mapsAdd()
    {
        return view('admin/maps/map_add');
    }

    public function mapsAddHandler(MapAddRequest $request)
    {
        //dd($request->all());

        Map::create($request->all());
        return redirect('/admin/mapsall');
    }

    public function mapsDeleteHandler($id)
    {
        $map = Map::find($id);
        $map->delete();
        return redirect()->back();
    }

    public function mapsEdit($id)
    {
        $map = Map::find($id);
        return view('admin/maps/map_edit')->with([
            'map'  => $map
        ]);
    }

    public function mapsEditHandler(Request $request)
    {
        $map = Map::find($request->id);
        $map->zipcode = $request->name;
        $map->save();
        return redirect('/admin/mapsall');

    }


    //---------------------------------orders action----------------------------------//

    public function orders()
    {
        return view('admin/orders/order');
    }

    public function ordersAll()
    {
        return view('admin/orders/order_all')->with([
            'orders' => Order::latest('id')->paginate(5)
        ]);
    }

    public function ordersAdd()
    {
        return view('admin/orders/order_add')->with([
            'cars'      => Car::all(),
            'zipcode'   => Map::all(),
        ]);
    }


    public function ordersAddHandler(OrderRequest $request)
    {

        Order::create($request->all());
        return redirect('/admin/ordersall');
    }

    public function ordersDeleteHandler($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back();
    }

}
