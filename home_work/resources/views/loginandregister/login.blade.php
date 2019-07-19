<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/frontend_css/login.css">
</head>
<body>
<div class="login-form">
    <form action="{!! url('login') !!}" method="post">
        @csrf
        <h2 class="text-center">Sign in</h2>
        <div class="form-group">
            @if(count($errors)>0)
                <div class='alert-danger' style="margin-bottom: 10px;">
                    @foreach($errors->all() as $err)
                        {{$err}}
                        <br>
                    @endforeach
                </div>
            @endif
            @if(Session::has('success'))
                <div class='alert-success' style="margin-bottom: 10px">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('flag'))
                <div style="margin-bottom: 10px" class="alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
            @endif
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" required="required" value="{{Cookie::get('email')}}">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary login-btn btn-block">Sign in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox" name="remember" id="remember"> Remember me</label>
            <a href="{{ route('password.request') }}" class="pull-right">Forgot Password?</a>
        </div>


    </form>
    <p class="text-center text-muted small">Don't have an account? <a href="{{route('register')}}">Sign up here!</a></p>
</div>
</body>

</html>