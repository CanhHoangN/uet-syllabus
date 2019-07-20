<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>Login</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/frontend_css/login.css">
</head>

<body>
<div class="login-box">
    <h1>Login</h1>
    <form method="post" action="{!! url('login') !!}">
        <!-- form Begin -->
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />



        <div class="textbox">
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
            <i class="fas fa-user"></i>
            <input name="email" placeholder="Email">
        </div>

        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password">
        </div>

        <input type="submit" class="btn" value="Sign in">
    </form><!-- form Finish -->
</div>
<script>
    @if(session('login'))
        alert('Please login !');
    @endif
</script>
</body>

</html>

