<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Register</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/frontend_css/register.css">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
</head>

<body>
<div class="register-box">
    <h1>Register</h1>
    <form action="{!! url('register') !!}" method="post" enctype="multipart/form-data">
        <!-- form Begin -->
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />

        @if(Session::has('success'))
            <div class='alert-success'>
                {{Session::get('success')}}
            </div>
        @endif
        <div class="textbox">
            @if(count($errors)>0)
                <div class='alert-danger' style="margin-bottom: 10px">
                    @foreach($errors->all() as $err)
                        {{$err}}
                        <br>
                    @endforeach
                </div>
            @endif
            <i class="fas fa-signature"></i>
            <input type="text" name="name" placeholder="Full name">
        </div>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input name="email" placeholder="Email">
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password">
        </div>
        <div class="textbox">
            <i class="fas fa-lock"></i>
            <input type="password" name="repassword" placeholder="Re-Password">
        </div>

        <input type="submit" class="btn" value="Create Account">
    </form><!-- form Finish -->
</div>
<!--  <div class="signup-form">
    <form action="{!! url('register') !!}" method="post" enctype="multipart/form-data">

      <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
      @if(count($errors)>0)
      <div class='alert alert-danger'>
        @foreach($errors->all() as $err)
        {{$err}}
        @endforeach
      </div>
      @endif
      @if(Session::has('success'))
      <div class='alert alert-success'>
        {{Session::get('success')}}
      </div>
      @endif
      <h1>Register</h1>
      <input name="name" placeholder="Full Name" class="txtb">
      <input name="email" placeholder="Email" class="txtb">
      <input name="password" type="password" placeholder="Password" class="txtb">
      <input name="repassword" type="password" placeholder="Re-Password" class="txtb">
      <input type="submit" value="Create Account" class="signup-btn">
    </form>
  </div>-->
</body>

</html>
