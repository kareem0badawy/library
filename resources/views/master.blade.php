<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
	<!--asset => Call File from public Folder-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/normalize.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
	<link rel="shortcut icon" href="{{asset('images/icon.png')}}" />
	<style type="text/css">
	body{
		background-color:#fff;
		background-size:100% auto;

	}
	header
	{
		opacity: 0.7;
	}
	footer{
		background-color: #fff; opacity: 0.9; text-align: center;
	}
	.btn
	{
		
	}
	
	</style>
</head>
<body>
	<header class="jumbotron">
		<div class="container">
			<div class="col-md-10">
				<h2>The Bookstore By Laravel !!</h2>
				<p>Learning and Reading Books</p>
			</div>
				<div class="col-md-2">
						<a href="/library">Home</a><br>
						@if(Auth::check())
						<a href="/admin">{{ Auth::user()->name }}</a>
						<a href="/auth/logout">Log out</a><br>
						@else
						<a href="/auth/login">Login</a><br>
						<a href="/auth/register">Register</a><br>
						@endif

					<!--this call method from controller and send library page-->

						<p><?php echo 'Date:' . date('Y-m-d');?></p>
						<p><?php echo 'Time:' . date('H:i:s');?></p>

				</div>
			
		</div>
	</header>

@if(Session::has('m'))
	<div class="container">
		<?php $a = []; $a = session()->pull('m'); ?>
		<div class="alert alert-{{ $a[0] }}">
			{{ $a[1] }}
		</div>

	</div>
@endif
<!-- Start the content varyings-->

	@yield('content')

<!--End Content-->

	<footer>
			&copy; right kareem badawy.com

	</footer>

</body>
</html>
