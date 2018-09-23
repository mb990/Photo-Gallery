@extends('layouts.app')

@section('content')
	<div class="jumbotron">
		<h2>Hello and welcome to the Photo Gallery website built with Laravel 5.5.</h2>
	</div>
	<div style="min-height: 300px; padding-top: 100px;" class="col col-lg-3 card float-left">
		<h3><a href="/albums/create/">Here</a> you can upload your favorite images and make albums.</h3>
	</div>
@endsection