@extends('layouts.admin_layouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <h2 class="text-center lead">Edit Method</h2>
    </div>
    <div id="container-fluid" style="padding-left: 20px">
        <form method="POST" action="{{url('/admin/methods/edited/'.$mt->idMethod)}}">
            @csrf
            <div class="form-group">
                <label for="nameMethod">ID: {{$mt->idMethod}} </label>
                <textarea style="width: 80%" name="nameMethod" id="nameMethod" rows="2">{{$mt->nameMethod}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{asset('/admin/methods')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
        </form>
    </div>
</div>
@endsection