@extends('master')


@section('content')

<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">Managing Section</div>
	<div class="panel-body">
		<h2><br /> Creating New Section</h2>
		<hr>

@if(count($errors)>0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
<!-- Creating New Section-->		
{!! Form::open(["url" => "library", "files" => "true"]) !!}
Enter The Name Of The Section : {!! Form::text("section_name") !!}<br/>
Uploade An Image : {!! Form::file("image") !!}<br/>
{!! Form::submit("Create",["class" => "btn btn-info"]) !!}
{!! Form::close() !!}
		
	</div>
@if($sections !=null)
<table class="table">
	<tr>
		<th><h3>Section Name</h3></th>
		<th><h3>Total Books</h3></th>
		<th><h3>Update</h3></th>
		<th><h3>Delete</h3></th>
		<th><h3>Show</h3></th>
		<th></th>
	</tr>
@foreach($sections as $section)
	@if($section->trashed())
		<tr style="background-color:#CA3C3C">
	@else
		<tr style="background-color:#FFF">
	@endif


	
	<!--Update existing Section-->
{!! Form::open(["url"=>"library/$section->id", "method"=>"patch"]) !!}
	<td>{!! Form::text("section_name",$section->section_name) !!}<td/>

<span style="margin-left: 50px;" class="label label-default">{{ $section->books_total }}</span>

<td>

	{!! Form::submit("Update",["class" => "btn btn-success"]) !!}

</td>
	{!! Form::close() !!}

@if($section->trashed())
<td>
	{!! Form::open(["url"=>"library/delete-forever/$section->id"]) !!}

	{!! Form::submit("Delete-Forever",["class" => "btn btn-danger"]) !!}

	{!! Form::close() !!}
</td>

@else
	<td>
	{!! Form::open(["url"=>"library/$section->id", "method"=>"delete"]) !!}

	{!! Form::submit("Delete",["class" => "btn btn-danger"]) !!}

	{!! Form::close() !!}
	</td>

	<td>
		<a href="library/{{$section->id}}" class="btn btn-default">Show</a>
	</td>
@endif







@if($section->trashed())
	<td>
		{!! Form::open(["url"=>"library/restore/$section->id"]) !!}

		{!! Form::submit("Restore",["class" => "btn btn-default"]) !!}

		{!! Form::close() !!}
	</td>
@endif


</tr>

@endforeach
</table>
@endif
</div>
	
</div>


@stop