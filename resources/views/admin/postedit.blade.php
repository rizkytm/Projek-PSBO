@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-md-offset-2">
				<div class="card">
                	<div class="card-header">Edit Post</div>

		                <div class="card-body">
		                    <form class="" action="{{ route('post.update', $post) }}" method="post">
							{{ csrf_field() }}
							{{ method_field('PATCH') }}
							<div class="form-group">
								<label for="">Title</label>
								<input type="text" class="form-control" name="title" placeholder="Post Title" value="{{ $post->title }}">
							</div>
							
							<div class="form-group">
								<label for="">Category</label>
								<select name="category_id" id="" class="form-control">
									@foreach ($categories as $category)
										<option
											value="{{ $category->id }}"
											@if($category->id === $post->category_id)
												selected
											@endif
										>
										{{ $category->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="">Content</label>
								<textarea name="content" rows="5" class="form-control" placeholder="Post Content">{{ $post->content }}</textarea>
							</div>

							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Save">
							</div>
							</form>
                		</div>
            	</div><br>
				
			</div>
		</div>
	</div>
@endsection