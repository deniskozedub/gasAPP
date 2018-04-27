@extends('admin.drivers.driver')
    @section('body')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="/admin/driversaddhandler" method="post" enctype="multipart/form-data">
                        {!!csrf_field()!!}

                        <div class="form-group">
                            <label for="driver" >Driver:</label><br>
                            <select  name="driver">
                                <option  value="-1" selected>None</option>
                                @foreach($drivers as $driver)
                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                @endforeach
                            </select>
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