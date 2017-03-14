@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Welcome</div>
					<div class="panel-body">
						Application's for Test.
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h1>Materials</h1>
					</div>
					@foreach($posts as $post)
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading"><a class="link-muted" href="{{ route('post', $post->id) }}">{{ $post->name }}</a></div>
							<div class="panel-body">
								<small>{{ $post->preview }}</small>
							</div>
						</div>
					</div>
					@endforeach
					<div class="col-md-12 text-center">
						{!! $posts->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
{{--<div class="flex-center position-ref full-height">--}}
	{{--@if (Route::has('login'))--}}
		{{--<div class="top-right links">--}}
			{{--@if (Auth::check())--}}
				{{--<a href="{{ url('/home') }}">Home</a>--}}
			{{--@else--}}
				{{--<a href="{{ url('/login') }}">Login</a>--}}
				{{--<a href="{{ url('/register') }}">Register</a>--}}
			{{--@endif--}}
		{{--</div>--}}
	{{--@endif--}}

	{{--<div class="content">--}}
		{{--<div class="title m-b-md">--}}
			{{--Laravel--}}
		{{--</div>--}}

		{{--<div class="links">--}}
			{{--<a href="https://laravel.com/docs">Documentation</a>--}}
			{{--<a href="https://laracasts.com">Laracasts</a>--}}
			{{--<a href="https://laravel-news.com">News</a>--}}
			{{--<a href="https://forge.laravel.com">Forge</a>--}}
			{{--<a href="https://github.com/laravel/laravel">GitHub</a>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--</div>--}}