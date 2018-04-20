@extends('admin.orders.order')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/ordersaddhandler" method="post">
                    {!!csrf_field()!!}
                    <div class="form-group">
                        <label for="name">Order's head:<br>@if($errors->has('name'))<span style="color: red">
                                    {{$errors->first('name')}}</span> @endif</label>
                        <input type="text" class="form-control @if($errors->has('name'))
                                has-error @endif" value="{{old('name')}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="car_id" >Order's car:</label><br>
                        <select  name="car_id">
                            <option  value="-1" selected>None</option>
                            @foreach($cars as $car)
                                <option value="{{$car->id}}">{{$car->model}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="map_id" >Order's zipcode:</label><br>
                        <select  name="map_id">
                            <option  value="-1" selected>None</option>
                            @foreach($zipcode as $item)
                                <option value="{{$item->id}}">{{$item->zipcode}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary form-control" value="Add Order">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection