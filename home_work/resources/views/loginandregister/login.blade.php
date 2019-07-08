<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="css/frontend_css/login.css">
</head>

<body>
	<div class="login-box">
		<h1>Login</h1>
		<form method="post" action="{!! url('login') !!}">
			<!-- form Begin -->
			<input type="hidden" name="_token" value="{!! csrf_token() !!}" />
			@if(Session::has('flag'))
			<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
			@endif
			<div class="textbox">
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
</body>

</html>

