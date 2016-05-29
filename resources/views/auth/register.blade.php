@extends('master')

@section('content')

<div class="container">
	{!! Form::open(["url"=>"/auth/register"]) !!}
	<table class="table" style="width:50%; margin:0 auto;">
		@if(count($errors)>0)
		<tr>
			<td colspan="2">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</td>
		</tr>
		@endif
		<tr>
			<td colspan="2">
				<h1 class="well text-center">Register Form</h1>
			</td>
		</tr>
		<tr>
			<td>Enter Your name : </td>
			<td>
				{!! Form::text("name") !!}
			</td>
		</tr>

		<tr>
			<td>Enter E-mail Address : </td>
			<td>
				{!! Form::email("email") !!}
			</td>
		</tr>

		<tr>
			<td>Enter The Password : </td>
			<td>
				{!! Form::password("password") !!}
			</td>
		</tr>

		<tr>
			<td>Confirm Your Password : </td>
			<td>
				{!! Form::password("password_confirmation") !!}
			</td>
		</tr>

		<tr>
			<td>Remember Me </td>
			<td>
				{!! Form::checkbox("remember") !!}
			</td>
		</tr>

		<tr>
			<td colspan="2">
				{!! Form::submit("Register") !!}
			</td>
		</tr>

	</table>
	{!! Form::close() !!}
</div>


@stop

