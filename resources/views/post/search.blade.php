@extends('layouts.app')

@section('content')
<div class="container">
	<div class="section">
	@if(count($hasil))
	<div class="row justify-content-center">
    	<h3><font color="green">Hasil Pencarian : {{ $query }}</font></h3><br>
    </div>
    <div class="row ">  <!-- justify-content-center -->
    	
    	
        @foreach ($hasil as $post)
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
                        
                    </div>
                </div>
            </div>
            <br>
        </div>
        @endforeach
        @endforeach

        
    </div>
        <center>{!! $hasil->render() !!}</center>
    </div>

    @else
    
	<div class="row justify-content-center">
		<h3><font color="red">Hasil pencarian "{{ $query }}" tidak ditemukan</font></h3>
	</div>

    @endif
</div>

    
@endsection