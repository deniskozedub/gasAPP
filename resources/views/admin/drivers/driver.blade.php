@extends('admin.layouts')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Actions</div>

                    <div class="card-body">
                        <ul>
                            <li><a href="/admin/driversall">All</a></li>
                            <li><a href="/admin/driversadd">Add</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Objects</div>
                    <div class="card-body">
                        @yield('body')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection