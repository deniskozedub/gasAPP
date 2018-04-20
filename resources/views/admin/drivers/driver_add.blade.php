@extends('admin.drivers.driver')
    @section('body')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="/admin/driversaddhandler" method="post" enctype="multipart/form-data">
                        {!!csrf_field()!!}
                        <div class="form-group">
                            <label for="name">Drivers's name:<br>@if($errors->has('name'))<span style="color: red">
                                    {{$errors->first('name')}}</span> @endif</label>
                            <input type="text" class="form-control @if($errors->has('name'))
                                    has-error @endif" value="{{old('name')}}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="surname">Drivers's surname:<br>@if($errors->has('surname'))<span style="color: red">
                                    {{$errors->first('surname')}}</span> @endif</label>
                            <input type="text" class="form-control @if($errors->has('surname'))
                                    has-error @endif" value="{{old('surname')}}" name="surname">
                        </div>
                        <div class="form-group">
                            <label for="pass">Drivers's password:<br>@if($errors->has('pass'))<span style="color: red">
                                    {{$errors->first('pass')}}</span> @endif</label>
                            <input type="password" class="form-control @if($errors->has('pass'))
                                    has-error @endif" value="{{old('pass')}}" name="pass">
                        </div>
                        <div class="form-group">
                            <label for="phone">Drivers's phone:<br>@if($errors->has('phone'))<span style="color: red">
                                    {{$errors->first('phone')}}</span> @endif</label>
                            <input type="number" class="form-control @if($errors->has('phone'))
                                    has-error @endif" value="{{old('phone')}}" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="email">Drivers's email:<br>@if($errors->has('email'))<span style="color: red">
                                    {{$errors->first('email')}}</span> @endif</label>
                            <input type="email" class="form-control @if($errors->has('email'))
                                    has-error @endif" value="{{old('email')}}" name="email">
                        </div>
                        <div class="block form-group">
                            <label for="image">Drivers's license:<br>@if($errors->has('image'))<span style="color: red">
                                    {{$errors->first('image')}}</span> @endif</label>
                            <input type="file"  name="image" accept="image/*">
                        </div>

                        <div class="form-group ">
                            <input type="submit" class="btn btn-primary form-control" value="Add Driver">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection