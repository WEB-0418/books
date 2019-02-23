@extends('layouts.main')

@section('content')
	<div class="container">
		@include('home.header')
		@include('home.nav')
		@include('home.jumbo-tron')
		@include('home.test2')
	</div>

	@include('home.main')
	@include('home.footer')

@endsection