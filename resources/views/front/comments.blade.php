<div class="col-md-12">
	<h1>Comments</h1>
</div>
@foreach($comments as $comment)
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">{{ $comment->author }}</div>
			<div class="panel-body">
				<small>{{ $comment->content }}</small>
			</div>
		</div>
	</div>
@endforeach
<div class="col-md-12 hidden" id="errors">
	<div class="panel panel-danger">
		<div class="panel-heading">Errors</div>
		<div class="panel-body" style="color: red"></div>
	</div>
</div>
<div class="col-md-12">
	<div class="panel panel-success">
		<div class="panel-heading">Add comment</div>
		<div class="panel-body">
			<form action="{{ route('addComment', $postId) }}" method="post" id="commentForm">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="post_id" value="{{ $postId }}">
				<div class="form-group">
					<label for="author">Author</label>
					<input type="text" class="form-control" id="author" name="author" placeholder="Author">
				</div>
				<div class="form-group">
					<label for="content">Text</label>
					<textarea name="content" class="form-control" id="content" cols="10" rows="10"
							  placeholder="Your comment"></textarea>
				</div>
				<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</div>