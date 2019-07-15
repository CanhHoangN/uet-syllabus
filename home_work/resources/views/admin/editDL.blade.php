@extends('layouts.admin_layouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <h2 class="text-center lead">Edit Description Level</h2>
    </div>
    <div id="container-fluid" style="padding-left: 20px">
        <form method="POST" action="{{asset('/admin/descLevels/edited/'.$dl->idLevel)}}">
            @csrf
            <div class="form-group">
                <label for="lv">ID: {{$dl->idLevel}} </label>
                <textarea style="width: 80%" name="lv" id="lv" rows="2">{{$dl->nameLevel}}</textarea>
                <label for="descLV">Description</label>
                <textarea style="width: 80%" name="descLV" id="descLV" rows="5">{{$dl->descriptionLevel}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{asset('/admin/descLevels')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
        </form>
    </div>
</div>
@endsection