@extends('admin.maps.map')
@section('body')
    <div class="all">
        <table class="table table-bordered">
            <tr>
                <th width="20">id</th>
                <th width="120">zipcode</th>
                <th width="240">actions</th>
            </tr>
            @foreach($maps as $item)
                <tr>
                    <td width="20">{{$item->id}}</td>
                    <td width="130">{{$item->zipcode}}</td>
                    <td>
                        <a class="btn btn-success" href="/admin/mapsedit/{{$item->id}}">edit</a>
                        <a class="btn btn-danger" href="/admin/mapsdeletehandler/{{$item->id}}">delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $maps->render() !!}

    </div>
@endsection