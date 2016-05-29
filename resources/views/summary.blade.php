@extends('master')

@section('content')

<div class="container">
	<h1 class="well text-center">Library Summary</h1>


<table class="table">
	<tr>
		<th style="width:25%">Section Name</th>
		<th style="width:25%">Book Title</th>
		<th style="width:25%">Book Description</th>
		<th style="width:25%">Authors</th>
	</tr>
	@foreach($results as $result)
		<tr>
			<td>
				<a href="/library/{{ $result->section->id }}">
					<span class="label label-info">{{ $result->section->section_name }}</span>
				</a>
			</td>
			<td>
				{{ $result->book_title }}
			</td>
			<td>
				{{ $result->book_description }}
			</td>
				<?php $authors = $result->authors; ?>
				<td>
					@foreach($authors as $author)
						<a href="/author/{{ $author->id }}">
							<span class="label label-danger">{{ $author->first_name}} {{ $author->last_name}}</span>
						</a>
					@endforeach
				</td>
			
		</tr>
	@endforeach
</table>
</div>
@stop