@extends('layouts.app')

@section('content')

	<h1 class="text-center">Upload photo</h1><hr>
	<div class="form-group">
	{!!Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
		{{Form::bsText('title', '', ['placeholder' => 'Photo title', 'class' => 'form-control'])}}
		<br>
		{{Form::bsTextArea('description', '', ['placeholder' => 'Photo description', 'class' => 'form-control'])}}
		<br>
		{{Form::hidden('album_id', $album_id)}}
		{{Form::bsFile('photo', ['class' => 'form-control-file'])}}
		<br>
		{{Form::bsSubmit('submit', ['class' => 'btn btn-primary'])}}
	{!!Form::close()!!}
	</div>

@endsection