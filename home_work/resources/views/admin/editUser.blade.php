@extends('layouts.admin_layouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <h2 class="text-center lead">Edit User</h2>
    </div>
    <script type="text/javascript">
        function validateForm()
        {
            var x = document.getElementById("nameUser").value;
            if(x == "")
            {
                alert("Name must be filled out");
                return false;
            }
        }
    </script>
    <div id="container-fluid" style="padding-left: 20px">
        <label for="nameMethod">ID: {{$customer->id}} </label>
        <form method="POST" name="editUser" action="{{url('/admin/editedUser/'.$customer->id)}}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="nameUser" id="nameUser" type="text" value="{{$customer->name}}">
                <label for="email">Email</label>
                <input name="email" id="email" type="email" value="{{$customer->email}}">
            </div>
            <button type="submit" onclick="return validateForm()" class="btn btn-primary">Edit</button>
            <a href="{{asset('/admin/customers')}}" id="ok1" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Cancel</a>
        </form>
    </div>

</div>
@endsection