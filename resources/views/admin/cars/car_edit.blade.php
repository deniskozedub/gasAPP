@extends('admin.cars.car')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/carsedithandler" method="post">
                    {!!csrf_field()!!}
                    <input type="hidden" name="id" value="{{$car->id}}">
                    <div class="form-group">
                        <label for="model">Model:</label>
                        <input type="text" class="form-control" name="model" value="{{$car->model}}">
                    </div>
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary form-control" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection