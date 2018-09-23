@extends ('layouts.app')

@section('content')
	<div class="jumbotron text-center">
		<h1>Hello</h1>
	</div>

		@if(count($albums) > 0)
			<?php
				$count = count($albums);
				$i = 1;
			?>
			<div id="albums">
				<div class="row text-center">
					@foreach($albums as $album)	
						@if($count == $i)					
							<div class="col-lg-4">
								<a href="/albums/{{$album->id}}">
									<img class ="img-thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
								</a>
								<br>
								<h3>{{$album->name}}</h3>				
						@else
								<div class="col-lg-4">
									<a href="/albums/{{$album->id}}">
										<img class ="img-thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
									</a>
									<h3>{{$album->name}}</h3>
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
			<p>No albums to display.</p>
		@endif
@endsection