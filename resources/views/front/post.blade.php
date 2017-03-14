@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ $post->name }}</div>
					<div class="panel-body">
						{{ $post->detail }}
					</div>
					<div class="panel-footer text-right">
						<a href="#" id="showComment">comments ({{ $post->comments->count() }})</a>
					</div>
				</div>
				<div class="row" id="comments" style="display: none">
					@include('front.comments', ['comments' => $post->comments, 'postId' => $post->id])
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(document).on("click", "#showComment", function(event){
			$("#comments").show();
			return false;
		});
		$(document).on('submit', '#commentForm', function() {
			var form = $(this);
			var $panelErrors;
			$panelErrors = $("#errors");
			$.ajax({
				url     : form.attr("action"),
				type    : form.attr("method"),
				data    : form.serialize(),
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				},
				beforeSend: function(){
					$panelErrors.addClass('hidden');
					$panelErrors.find(".panel-body").html('');
				},
				success: function(data){
					if(data.message == "OK") {
						$("#comments").html(data.comments);
					}
					if (data.message == "ERROR") {
						$panelErrors.removeClass('hidden');
						$panelErrors.find(".panel-body").html(data.errors);
					}
//					console.log(data);
				},
				error: function( errors ) {
//					console.log(errors);
				}
			})
			return false;
		})
	</script>
@endsection
