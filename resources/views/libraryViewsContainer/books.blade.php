@extends('master')


@section('content')

<div class="container">
	<h1>{{ $sections->section_name }}</h1>
	<br>

	<table class="table">
		{!! Form::open(["url"=>"books"]) !!}
		{!! Form::hidden("section_id",$sections->id) !!}
		<tr>
			<td>Enter the title of the Book : </td>
			<td>{!! Form::text("book_title") !!}</td>
		</tr>

		<tr>
			<td>Enter the Edition Number : </td>
			<td>{!! Form::text("book_edition") !!}</td>
		</tr>
		<tr>
			<td>Description the Book : </td>
			<td>{!! Form::textarea("book_description") !!}</td>
		</tr>

		<tr>
			<td>{!! Form::submit("Add", ["class"=> "btn btn-info"]) !!}</td>
		</tr>
		{!! Form::close() !!}
	</table>

	<table class="table">
		<tr>
			<th><h3>Book Title</h3></th>
			<th><h3>Book Edition</h3></th>
			<th><h3>Book Description</h3></th>
			<th></th>
			<th></th>
		</tr>

		@foreach ( $all_books as $books) 
			<tr>
			{!! Form::open(["url"=>"books/$books->id", "method"=>"patch"])!!}
			{!! Form::hidden("section_id",$sections->id) !!}
				<td>
					{!! Form::text("book_title", $books->book_title) !!}
				</td>
				<td>
					{!! Form::text("book_edition", $books->book_edition) !!}
				</td>
				<td>
					{!! Form::textarea("book_description", $books->book_description) !!}
				</td>
				<td>
					{!! Form::submit("Update",["class"=>"btn btn-success"]) !!}
				</td>
					{!! Form::close() !!}
				<td>
					{!! Form::open(["url"=>"books/$books->id", "method"=>"DELETE"]) !!}
					{!! Form::hidden("section_id",$sections->id) !!}
					{!! Form::submit("Delete",["class"=>"btn btn-danger"]) !!}
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach
	</table>

</div>

@stop