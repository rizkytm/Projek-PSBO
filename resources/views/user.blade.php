@extends('layouts.app')

@section('content')


<div class="container">
    <div class="jumbotron" style="background-image: url('../assets/welcome/gambar/latarfix.jpg'); height: 245px width: 1110px">
        <h1 class="display-4">Bakul {{ $user->name }}</h1>
        
        
        <h2>Email kamu: {{ $user->email }}</h2>
            
        
        <!-- <hr class="my-4"> -->
    </div>

<div class="row ">  <!-- justify-content-center -->
        @foreach ($posts as $post)
        @foreach ($post->user()->get() as $users)
        <div class="col-md-4">    
            <div class="card-deck">
                <div class="card"><br>
                    <video width = "348" height = "180">
                        <source src="../storage/{{ $post->video }}" type="video/mp4">
                    </video>
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('post.show', $post) }}"><strong>{{ $post->title }}</strong><a/></h5>
                            <p class="card-text">{{ str_limit($post->content, 100, ' ...') }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('profile.user', $users) }}"><small>{{ $users->name }}</small></a>
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
    </div></div>
@endsection
