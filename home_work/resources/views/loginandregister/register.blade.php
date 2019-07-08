<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="css/frontend_css/register.css">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
</head>

<body>
  <div class="signup-form">
    <form action="{!! url('register') !!}" method="post" enctype="multipart/form-data">
      <!-- form Begin -->
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
  </div>
</body>

</html>