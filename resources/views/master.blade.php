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
						<a href="/library">Home</a>
					<br>
						<a href="/admin">Create</a>
					<br>
					<!--this call method from controller and send library page-->

						<p><?php echo 'Date:' . date('Y-m-d');?></p>
						<p><?php echo 'Time:' . date('H:i:s');?></p>

				</div>
			
		</div>
	</header>

<!-- Start the content varyings-->

	@yield('content')

<!--End Content-->

	<footer>
			&copy; right kareem badawy.com

	</footer>

</body>
</html>
