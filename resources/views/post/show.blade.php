@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-md-offset-2">

				<div class="card">
					@foreach($post->user()->get() as $users)
	                	<div class="card-header"><h4>{{ $post->title }}</h4></div>
	            	@endforeach
	                <div class="card-body">
		                <ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
							    <a class="nav-link active" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="true">Video</a>
							</li>
							<li class="nav-item">
							    <a class="nav-link" id="pdf-tab" data-toggle="tab" href="#pdf" role="tab" aria-controls="pdf" aria-selected="false">PDF</a>
							</li>
						</ul>
						<!-- Ini Konten video + deskripsi -->
						<div class="tab-content" id="myTabContent">
							<!-- Di sini konten video + deskripsi-->
							<div class="tab-pane fade show active" id="video" role="tabpanel" aria-labelledby="video-tab">
								<div class="row">	
									<div class="col-8">
										<br>
										<video width="100%" height="90%" controls>
											<source src="../storage/{{ $post->video }}" type="video/mp4">
											Your browser does not support the video tag.
										</video>
										
									</div>
									<div class="col-4"><br>
						  				<div class="card bg-light mb-3" style="max-width: 18rem;">
						  					<div class="card-header">
							  					@foreach($post->user()->get() as $users)
			                						<strong>{{ $users->name }}</strong><br>
			                						<small>{{ $post->category->name }}</small>
		            							@endforeach
		            						</div>
										  	<div class="card-body">
										    	<p class="card-text">{{ $post->content }}</p>
										  	</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Di sini konten pdf & deskripsi -->
							<div class="tab-pane fade" id="pdf" role="tabpanel" aria-labelledby="pdf-tab">
						  		<div class="row">
						  			<div class="col-8">
						  				<br>
						  				<object width="100%" height="480" data="../storage/{{ $post->pdf }}"></object>
						  			</div>
						  			<div class="col-4"><br>
						  				<div class="card bg-light mb-3" style="max-width: 18rem;">
						  					<div class="card-header">
							  					@foreach($post->user()->get() as $users)
			                						<strong>{{ $users->name }}</strong><br>
			                						<small>{{ $post->category->name }}</small>
		            							@endforeach
		            						</div>
										  	<div class="card-body">
										    	<p class="card-text">{{ $post->content }}</p>
										  	</div>
										</div>
									</div>
								</div>
							</div>
						</div>
	                </div>
	               
	            </div><br>
				
				<div class="card">
	                <div class="card-header"><h4>Komentar</h4></div>

                	<div class="card-body">
                		@foreach($post->comments()->get() as $comment)
	                		<h5>{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</h5>
	                		
	                		<p>{{ $comment->message }}</p>
	                	@endforeach
	                
	                
	                
	                    <form action="{{ route('post.comment.store', $post) }}" method="post" class="form-horizontal">
	                    	{{ csrf_field() }}
	                    	<textarea name="message" id="" rows="2" class="form-control" placeholder="Berikan komentar..."></textarea>
	                    	<br>
	                    	<input type="submit" value="Submit" class="btn btn-primary">
	                    </form>
	                </div>
	            </div><br>

			</div>
		</div>
	</div>
@endsection