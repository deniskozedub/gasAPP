@extends('admin.cars.car')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="/admin/carsaddhandler" method="post" enctype="multipart/form-data">
                    {!!csrf_field()!!}
                    <div class="form-group">
                        <label for="model">Model:<br>@if($errors->has('model'))<span style="color: red">
                                    {{$errors->first('model')}}</span> @endif</label>
                        <input type="text" class="form-control @if($errors->has('model'))
                                has-error @endif" value="{{old('model')}}" name="model">
                    </div>
                    <div class="form-group">
                        <label for="driver" >Driver:</label><br>
                        <select  name="driver">
                            <option  value="-1" selected>None</option>
                            @foreach($drivers as $driver)
                                <option value="{{$driver->id}}">{{$driver->getDriver->name}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="block form-group">
                        <label for="image">Plate License:<br>@if($errors->has('image'))<span style="color: red">
                                    {{$errors->first('image')}}</span> @endif</label><br>
                        <input type="file" name="image" accept="image/*">
                    </div>

                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary form-control" value="Add Car">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection