<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 14.03.17
 * Time: 16:47
 */
?>
@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1>@if($post->id)Update @else Create @endif post</h1>
						@if($post->id)
						<small><a href="{{ route('adminComments', $post->id) }}">Edit comments</a></small>
						@endif
					</div>
					<div class="panel-body">
						<form action="{{ route('updatePost', $post->id) }}" method="post" id="postForm" class="">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="status" @if($post->status) checked @endif> Active
								</label>
							</div>
							<div class="form-group">
								<label for="name">Title</label>
								<input type="text" class="form-control" id="name" name="name" value="{{ $post->name }}" placeholder="Title">
							</div>
							<div class="form-group">
								<label for="content">Preview Text</label>
								<textarea name="preview" class="form-control" id="preview" cols="10" rows="10"
										  placeholder="Preview Text">{{ $post->preview }}</textarea>
							</div>
							<div class="form-group">
								<label for="content">Detail Text</label>
								<textarea name="detail" class="form-control" id="detail" cols="10" rows="10"
										  placeholder="Detail Text">{{ $post->detail }}</textarea>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
