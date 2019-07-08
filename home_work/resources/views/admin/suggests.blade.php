@extends('layouts.admin_layouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <h2 class="text-center lead">Suggests: {{$template->nameTemplate}}</h2>
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
        <div class="btn-group btn-group-justified">
            <button type="button" class="btn btn-primary "><a href="{{asset('/admin/suggest/1')}}">ILO</a></button>
            <button type="button" class="btn btn-primary "><a href="{{asset('/admin/suggest/2')}}">OBA</a></button>
            <button type="button" class="btn btn-primary "><a href="{{asset('/admin/suggest/3')}}">TLA</a></button>
        </div>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>IdLevel</th>
                    <th>Title</th>
                    <th>Description Suggest</th>
                    <th>Example</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sg as $s)
                <tr>
                    <td>{{$s->idLevel}}</td>
                    <td>{{$s->title}}</td>
                    <td>{{$s->descriptionSuggest}}</td>
                    <td>{{$s->example}}</td>
                    <td>
                        <a href="{{asset('/admin/editSuggest/'.$template->idTemplate.'/'.$s->idLevel)}}">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection