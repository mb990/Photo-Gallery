@extends('layouts.app')

@section('content')

<div class="row text-center">
	<div class="col-lg-9">
		<img style="width: 100%; height: 100%;" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}">
		<h4>{{$photo->title}}</h4>
	</div>
	<div style="border:groove; padding-top: 10px; background-color: white;" class="col-lg-3 text-center">
		<h2>O slici:</h2>
		<p>{{$photo->description}}</p>
	</div>
</div>
</br></br></br>
<div class="row">
	<div class="col-lg-12">
		{!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
			{{Form::hidden('_method', 'DELETE')}}
			{{Form::bsSubmit('Delete photo', ['class' => 'btn btn-danger'])}}
		{!!Form::close()!!}
		<br>
		<button class="btn btn-info" onclick="history.go(-1);">Back</button>
		<hr>
		<small>Size: {{$photo->size}}</small>
	</div>
</div>
@endsection
		
