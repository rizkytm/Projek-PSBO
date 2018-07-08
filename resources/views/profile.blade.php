@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron" style="background-image: url('assets/welcome/gambar/latarfix.jpg'); height: 245px width: 1110px">
        <h1 class="display-4">Bakul {{ Auth::user()->name }}</h1>
        
        
        <h2>Email kamu: {{ Auth::user()->email }}</h2>
            
        
        <!-- <hr class="my-4"> -->
    </div>

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
                            <a href="{{ route('post.edit', $post) }}" class="btn btn-primary">Edit</a>
                            <!--<form class="delete" action="{{ route('post.destroy', $post) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}    -->
                                <button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete">Hapus</button>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
        @include('modal')
        @endforeach
        @endforeach
    </div></div>




@endsection
