@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="{{ route('createPost') }}" class="btn btn-primary">
							<i class="fa fa-plus"></i> Новая запись
						</a>
						<div class="pull-right">
						</div>
					</div>

					<table class="table-primary table table-striped">
						<colgroup>
							<col width="30px">
							<col width="100px">
							<col width="100px">
							<col width="30px">
							<col width="10px">
						</colgroup>
						<thead>
						<tr>
							<th class="row-header">
								ID
							</th>
							<th class="row-header">
								Name
							</th>
							<th class="row-header">
								Updated At
							</th>
							<th class="row-header">
								Active
							</th>
							<th class="row-header"></th>
						</tr>
						</thead>
						<tbody>
						@foreach($posts as $post)
						<tr>
							<td class="row-text">{{ $post->id }}</td>
							<td class="row-link"><a class="link-muted" href="{{ route('postForm', $post->id) }}">{{ $post->name }}</a></td>
							<td class="row-text">{{ $post->updated_at }}</td>
							<td class="row-text">{{ $post->status }}</td>
							<td class="text-right">
								<a href="{{ route('postForm', $post->id) }}"
								   class="btn btn-xs btn-primary" title="Редактировать" data-toggle="tooltip">
									<i class="fa fa-pencil"></i>
								</a>
								<form action="{{ route('deletePost', $post->id) }}" method="POST"
									  style="display:inline-block;" id="delete-{{ $post->id }}">
									<input name="_token" value="{{ csrf_token() }}" type="hidden">
									<input name="_method" value="delete" type="hidden">
									<button class="btn btn-xs btn-danger btn-delete" title="Удалить"
											data-toggle="tooltip">
										<i class="fa fa-trash"></i>
									</button>
								</form>

							</td>
						</tr>
						@endforeach
						</tbody>

					</table>
					<div class="panel-footer text-center">
						{!! $posts->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		$(document).on("click", "form[id^=delete]", function(event){
			var question = confirm('Вы уверены?');
			return !!question;
		});
	</script>
@endsection