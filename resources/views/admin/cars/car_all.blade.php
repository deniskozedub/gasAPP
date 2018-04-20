@extends('admin.cars.car')
@section('body')
    <div class="all">
        <table class="table table-bordered">
            <tr>
                <th width="20">id</th>
                <th width="120">picture</th>
                <th width="120">model</th>
                <th width="150">driver's name</th>
                <th width="150">actions</th>
            </tr>

            @foreach($cars as $item)
                <tr>
                    <td width="20">{{$item->id}}</td>
                    <td><img width="120px" src="/image_cars/{{$item->imageCar->url}}" alt="{{$item->name}}"></td>
                    <td width="130">{{$item->model}}</td>
                    <td width="120px">{{$item->driver->name}}</td>
                    <td>
                        <a class="btn btn-success" href="/admin/carssedit/{{$item->id}}">edit</a>
                        <a class="btn btn-danger" href="/admin/carsdeletehandler/{{$item->id}}">delete</a>
                    </td>
                </tr>
          @endforeach
        </table>
        {!! $cars->render() !!}

    </div>
@endsection