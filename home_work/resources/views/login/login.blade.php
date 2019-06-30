<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset("css/login.css")}}">
</head>
<body>
    <div class="box-login">
        <div class="form-login">
            <div class="text-head">
                <p>Login</p>
            </div>
            <div class="email">
                <span>Email</span>
                <input type="email" placeholder="" name="email" id="email">
            </div>
            <div class="password">
                <span>Password</span>
                <input type="password" placeholder="" name="password">
            </div>
            <div class="submit">
                Submit
            </div>
        </div>
        <div class="bg">
            <img  src="{{asset('images/logo_uet1.png')}}" alt="">
        </div>
    </div>


</body>
</html>
