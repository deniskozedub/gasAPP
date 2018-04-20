@extends('admin.maps.map')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/mapsedithandler" method="post">
                    {!!csrf_field()!!}
                    <input type="hidden" name="id" value="{{$map->id}}">
                    <div class="form-group">
                        <label for="name">ZipCode:</label>
                        <input type="text" class="form-control" name="name" value="{{$map->zipcode}}">
                    </div>
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary form-control" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection