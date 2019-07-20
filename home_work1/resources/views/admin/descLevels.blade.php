@extends('layouts.admin_layouts.admin_design')
@section('content')
    <div id="content">
        <div id="content-header">
            <h2 class="text-center lead">Description Levels</h2>
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
                    <th>Id</th>
                    <th>Level</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($descLevels as $dl)
                    <tr>
                        <td>{{$dl->idLevel}}</td>
                        <td>{{$dl->nameLevel}}</td>
                        <td>{{$dl->descriptionLevel}}</td>
                        <td>
                            <a href="{{url('admin/descLevels/edit/'.$dl->idLevel)}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
