@extends('layouts.admin_layouts.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
        <h2 class="text-center lead">List Users</h2>
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
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('/admin/listCustomer')}}">
            @csrf
            <div class="control-group">
                <label class="control-label">User Name</label>
                <div class="controls">
                    <input type="text" name="cName">
                </div>
            </div>
            <div class="form-actions">
                <input type="submit" value="Search" class="btn btn-success">
            </div>
        </form>
    </div>
    <div id="container-fluid">
        <p>Total: {{$total}}</p>
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{$c->email}}</td>
                    <td>{{$c->admin}}</td>
                    <td>
                        <button type="button" class="btn btn-primary"><a style="color:white" href="{{url('/admin/syllabus/'.$c->id)}}" target="_blank">syllabus</a></button>
                        <button type="button" class="btn btn-primary"><a style="color:white" href="{{url('/admin/editUser/'.$c->id)}}">edit</a></button>
                        <button type="button" class="btn btn-primary"><a style="color:white" href="{{url('/admin/add/'.$c->id)}}">add admin</a></button>
                        <button onclick="return myFunction()" type="button" class="btn btn-danger"><a style="color:white" href="{{url('/admin/customer/delete/'.$c->id)}}">delete user</a></button>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $customers->links() }}


    </div>
    <script>
        function myFunction() {
            var r = confirm("Delete user ?");
            return r;
        }
    </script>
</div>

@endsection