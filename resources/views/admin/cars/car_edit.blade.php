@extends('admin.cars.car')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/carsedithandler" method="post">
                    {!!csrf_field()!!}
                    <input type="hidden" name="id" value="{{$car->id}}">
                    <div class="form-group">
                        <label for="name">Model:</label>
                        <input type="text" class="form-control" name="name" value="{{$car->model}}">
                    </div>
                    <div class="form-group">
                        <label for="driver" >Driver:</label>
                        <b>{{$car->driver->name}}</b>
                        <br>
                        <select  name="driver">
                            <option  value="{{$car->driver->id}}">{{$car->driver->name}}</option>
                            @foreach($drivers as $driver)
                                <option value="{{$driver->id}}">{{$driver->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary form-control" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection