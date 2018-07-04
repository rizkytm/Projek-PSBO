@extends('layouts.app')

@section('content')
<div class="container">

	<div class="row justify-content-center">
		<form action="{{ route('query') }}" method="GET">
			<div class="row">
				
				<input type="text" class="validate" name="search" placeholder="Search Title Here" value="{{ old('title') }}">
				<button type="submit" class="btn btn-primary">Search</button>
			</div>
		</form>
	</div>
	<br>

    <div class="row ">  <!-- justify-content-center -->
    	
        @foreach ($posts as $post)
        @foreach ($post->user()->get() as $users)
        <div class="col-md-4">    
            <div class="card-deck">
                <div class="card"><br>
                    <video width = "348" height = "180">
                        <source src="storage/{{ $post->video }}" type="video/mp4">
                    </video>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('post.show', $post) }}"><strong>{{ $post->title }}</strong><a/></h5>
                            <p class="card-text">{{ str_limit($post->content, 100, ' ...') }}</p>
                    </div>
                    <div class="card-footer">
                    	@if($users->name === Auth::user()->name)
                    	<a href="{{ route('profile.index') }}"><small>{{ $users->name }}</small></a>
                    	@else
                    	
                    	<a href="{{ route('profile.user', $users) }}"><small>{{ $users->name }}</small></a>
                    	@endif
                        
                        <small> | 
                        	{{ $post->category->name }} | {{ $post->created_at->diffForHumans() }}
                        </small>
                        <div class="row float-right">
                            
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        @endforeach
        @endforeach
    </div>
        <center>{!! $posts->render() !!}</center>
    </div>
</div>
@endsection