@extends('layouts.admin_layouts.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <h2 class="text-center lead">Methods</h2>
            @if(Session::has('flash_message_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{!! session('flash_message_success') !!}</strong>
                </div>
            @endif
            @if(Session::has('flash_message_error'))
                <div class="alert alert-error alert-block">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{!! session('flash_message_error') !!}</strong>
                </div>
            @endif
        </div>
        <div id="container-fluid">
            <table class="table table-dark table-hover">
                <thead>
                <tr>
                    <th>Id Method</th>
                    <th>Id Template </th>
                    <th>Id Level</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mt as $m)
                    <tr>
                        <td>{{$m->idMethod}}</td>
                        <td>{{$m->idTemplate}}</td>
                        <td>{{$m->idLevel}}</td>
                        <td>{{$m->nameMethod}}</td>
                        <td>
                            <a href="{{url('admin/methods/edit/'.$m->idMethod)}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>

@endsection
