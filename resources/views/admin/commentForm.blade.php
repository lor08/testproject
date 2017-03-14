<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 14.03.17
 * Time: 17:45
 */
?>
@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h1>Update comment</h1>
					</div>
					<div class="panel-body">
						<form action="{{ route('updateComment', $comment->id) }}" method="post" id="commentForm" class="">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label for="author">Author</label>
								<input type="text" class="form-control" id="author" name="author" value="{{ $comment->author }}" placeholder="Author">
							</div>
							<div class="form-group">
								<label for="content">Text</label>
								<textarea name="content" class="form-control" id="content" cols="10" rows="10"
										  placeholder="Your comment">{{ $comment->content }}</textarea>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection