@extends('layouts.admin_layouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <h2 class="text-center lead">Edit Suggest </h2>
    </div>
    <div id="container-fluid" style="padding-left: 20px">
        <form method="POST" action="{{asset('/admin/editedSuggest/'.$idTemp.'/'.$sg->idLevel)}}">
        @csrf
            <div class="form-group">
                <label for="titleSG">Title</label>
                <textarea style="width: 80%" name="titleSG" id="titleSG" rows="3" >{{$sg->title}}</textarea>
            </div>
            <div class="form-group">
                <label for="descSG">Description Suggest</label>
                <textarea style="width: 80%" name="descSG" id="descSG" rows="5" >{{$sg->descriptionSuggest}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleSG">Example</label>
                <textarea style="width: 80%" name="exampleSG" id="exampleSG" rows="5" >{{$sg->example}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{asset('/admin/suggest/1')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
        </form>
    </div>
</div>
@endsection