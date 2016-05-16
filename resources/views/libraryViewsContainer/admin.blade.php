@extends('master')


@section('content')

<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">Managing Section</div>
	<div class="panel-body">
		<h2><br /> Creating New Section</h2>
		<hr>
			
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
	</tr>
@foreach($sections as $section)

	<tr>
	
	<!--Update existing Section-->
{!! Form::open(["url"=>"library/$section->id", "method"=>"patch"]) !!}
<td>{!! Form::text("section_name",$section->section_name) !!}<td/>

	<span style="margin-left: 50px;" class="label label-default">{{ $section->books_total }}</span>

<td>

{!! Form::submit("Update",["class" => "btn btn-success"]) !!}

</td>
{!! Form::close() !!}


<td>
{!! Form::open(["url"=>"library/$section->id", "method"=>"delete"]) !!}

{!! Form::submit("Delete",["class" => "btn btn-danger"]) !!}

{!! Form::close() !!}
</td>

</tr>

@endforeach
</table>
@endif
</div>
	
</div>


@stop