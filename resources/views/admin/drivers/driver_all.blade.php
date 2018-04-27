@extends('admin.drivers.driver')
@section('body')
    <div class="all">
        <table class="table table-bordered">
            <tr>
                <th width="20">id</th>
                <th width="120">name</th>
                <th width="120">surname</th>
                <th width="50">password</th>
                <th width="100">phone</th>
                <th width="50">email</th>
                <th width="150">picture</th>
                <th width="240">actions</th>
            </tr>
            @foreach($drivers as $item)
                    <td width="20">{{$item->id}}</td>
                    <td width="130">{{$item->getDriver->name}}</td>
                    <td width="130">{{$item->getDriver->surname}}</td>
                    <td width="50">{{ substr($item->getDriver->password,1,10).'...'}}</td>
                    <td width="100">{{$item->getDriver->phone}}</td>
                    <td width="100">{{$item->getDriver->email}}</td>
                    <td><img width="120px" src="/image_drivers/{{$item->imageDriver->url}}" alt="{{$item->name}}"></td>
                    <td>
                        <a class="btn btn-success" href="/admin/driversedit/{{$item->id}}">edit</a>
                        <a class="btn btn-danger" href="/admin/driversdeletehandler/{{$item->id}}">delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $drivers->render() !!}

    </div>
@endsection