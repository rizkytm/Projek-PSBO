@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
		<div class="col col-md-8">
		<div class="card">
			<div class="card-header">
				<center><b>Create Post</b></center>
			</div>
			<div class="card-body">
		
		<form class="" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="form-group has-feedback {{ $errors->has('title') ? ' has-error' : '' }}">
				<label for="">Title</label>
				<input type="text" class="form-control" name="title" placeholder="Post Title" value="{{ old('title') }}">
				@if ($errors->has('title'))
					<span class="help-block">
						<p>{{ $errors->first('title') }}</p>
					</span>
				@endif
			</div>
			
			<div class="form-group">
				<label for="">Category</label>
				<select name="category_id" id="" class="form-control">
					@foreach ($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group has-feedback {{ $errors->has('content') ? ' has-error' : '' }}">
				<label for="">Content</label>
				<textarea name="content" rows="5" class="form-control" placeholder="Post Content">{{ old('content') }}</textarea>
				@if ($errors->has('content'))
					<span class="help-block">
						<p>{{ $errors->first('content') }}</p>
					</span>
				@endif
			</div>

			<div class="form-group">
				<label for="">Video</label>
				<input id="video" type="file" class="form-control{{ $errors->has('video') ? ' is-invalid' : '' }}" name="video" required>
				@if ($errors->has('video'))
					<span class="help-block">
						<p>{{ $errors->first('video') }}</p>
					</span>
				@endif
			</div>

			<div class="form-group">
				<label for="">PDF</label>
				<input id="pdf" type="file" class="form-control{{ $errors->has('pdf') ? ' is-invalid' : '' }}" name="pdf" required>
				@if ($errors->has('pdf'))
					<span class="help-block">
						<p>{{ $errors->first('pdf') }}</p>
					</span>
				@endif
			</div>

			<div class="form-group">
				<input type="submit" class="btn btn-primary" value="Save">
			</div>
		</form>
	</div>
</div>
</div>
</div>
</div>
@endsection