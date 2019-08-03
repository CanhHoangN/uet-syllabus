<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if($language == "vi")
        <title>Đăng kí</title>
    @else
        <title>Register</title>
    @endif
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/frontend_css/register.css">
</head>
<body>
<div class="register-form">
    <form action="{!!url('register')!!}" method="post">
        @csrf
        @if($language == "vi")
            <h2 class="text-center">Đăng kí</h2>
        @else
            <h2 class="text-center">Register</h2>
        @endif
        <div class="form-group">
            @if(Session::has('success'))
                <div class='alert-success'>
                    {{Session::get('success')}}
                </div>
            @endif
            @if(count($errors)>0)
                <div class='alert-danger'>
                    @foreach($errors->all() as $err)
                        {{$err}}
                        <br>
                    @endforeach
                </div>
            @endif
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                @if($language == "vi")
                    <input type="text" class="form-control" name="name" placeholder="Tên tài khoản" required="required">
                @else
                    <input type="text" class="form-control" name="name" placeholder="Username" required="required">
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                @if($language == "vi")
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required="required">
                @else
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                @endif

            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                @if($language == "vi")
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu" required="required">
                @else
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Re-Password" required="required">
                @endif

            </div>
        </div>
        <div class="form-group">
            @if($language == "vi")
                <button type="submit" class="btn btn-primary login-btn btn-block">Tạo tài khoản</button>
            @else
                <button type="submit" class="btn btn-primary login-btn btn-block">Create Account</button>
            @endif
        </div>



    </form>

</div>
</body>
</html>
