@extends('admin.drivers.driver')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/driversedithandler" method="post">
                    {!!csrf_field()!!}
                    <input type="hidden" name="id" value="{{$driver->id}}">
                    <div class="form-group">
                        <label for="name">Drivers's name:</label>
                        <input type="text" class="form-control" name="name" value="{{$driver->name}}">
                    </div>
                    <div class="form-group">
                        <label for="surname">Drivers's surname:</label>
                        <input type="text" class="form-control " name="surname" value="{{$driver->surname}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Drivers's phone:</label>
                        <input type="number" class="form-control" name="phone" value="{{$driver->phone}}">
                    </div>
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary form-control" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection