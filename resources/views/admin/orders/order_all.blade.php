@extends('admin.orders.order')
@section('body')
    <div class="all">
        <table class="table table-bordered">
            <tr>
                <th width="20">id</th>
                <th width="230">order's name</th>
                <th width="150">order's car</th>
                <th width="250">order's zipcode</th>
                <th width="50">actions</th>
            </tr>
            @foreach($orders as $item)
                <tr>
                    <td width="20">{{$item->id}}</td>
                    <td width="230">{{$item->name}}</td>
                    <td width="150">{{$item->orderCar->model}} <b>({{$item->orderCar->driver->getDriver->name}})</b></td>
                    <td width="250">{{$item->orderZipCode->zipcode}}</td>
                    <td>
                        <a class="btn btn-danger" href="/admin/ordersdeletehandler/{{$item->id}}">delete</a>
                    </td>
                </tr>
          @endforeach
        </table>
        {!! $orders->render() !!}

    </div>
@endsection