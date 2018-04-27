<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }

    public function index()
    {
        return OrderCollection::collection(Order::all());
    }

    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response('DELETE',204);
    }

    public function store(OrderRequest $request,Order $order)
    {
        $order::create($request->all());
        return response("CREATE",201);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return response("UPDATE",200);
    }


}
