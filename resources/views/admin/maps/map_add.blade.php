@extends('admin.maps.map')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/mapsaddhandler" method="post">
                    {!!csrf_field()!!}
                    <div class="form-group">
                        <label for="zipcode">ZipCode:<br>@if($errors->has('zipcode'))<span style="color: red">
                                    {{$errors->first('zipcode')}}</span> @endif</label>
                        <input type="text" class="form-control @if($errors->has('name'))
                                has-error @endif" value="{{old('zipcode')}}" name="zipcode">
                    </div>
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary form-control" value="Add Zipcode">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection