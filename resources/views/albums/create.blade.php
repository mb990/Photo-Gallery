@extends('layouts.app')

@section('content')

	<h1 class="text-center">Create a new album</h1><hr>
	<div class="form-group">
	{!!Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
		{{Form::bsText('name', '', ['placeholder' => 'Album name', 'class' => 'form-control'])}}
		<br>
		{{Form::bsTextArea('description', '', ['placeholder' => 'Album description', 'class' => 'form-control'])}}
		<br>
		{{Form::bsFile('cover_image', ['class' => 'form-control-file'])}}
		<br>
		{{Form::bsSubmit('submit', ['class' => 'btn btn-primary'])}}
	{!!Form::close()!!}
	</div>

@endsection