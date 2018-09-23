@extends('layouts.app')

@section('content')
	<h2>{{$album->name}}</h2>
	<a class="btn btn-info" href="/albums/">Back</a>
	<a class="btn btn-primary" href="/photos/create/{{$album->id}}">Upload photo</a>
	<hr>
	@if(count($album->photos) > 0)
			<?php
				$count = count($album->photos);
				$i = 1;
			?>
			<div id="photos">
				<div class="row text-center">
					@foreach($album->photos as $photo)	
						@if($count == $i)					
							<div class="col col-lg-4">
								<a href="/photos/{{$photo->id}}">
									<img class ="img-thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
								</a>
								<br>
								<h3>{{$photo->title}}</h3>				
						@else
								<div class="col col-lg-4">
									<a href="/photos/{{$photo->id}}">
										<img class ="img-thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
									</a>
									<h3>{{$photo->title}}</h3>
						@endif

						@if($i % 3 == 0)
							</div><div class="row text-center">
						@else
							</div>
						@endif
						<?php $i++; ?>
					@endforeach
				</div>
			</div>
		@else
			<p>No photos to display.</p>
		@endif
@endsection