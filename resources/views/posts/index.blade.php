@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="lead my-2">Posts</h1>
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="well">
                    <div class="row my-4">
                        <div class="col-md-4 col-sm-4">
                            <img style="width: 100%" src="/storage/cover_image/{{$post->cover_image}}" alt="Post Image">
                        </div>
                        <div class="col-md-8 col-sm-4">
                            <a href="/posts/{{$post->id}}"><h3>{{$post->title}}</h3></a>
                            <small>Wriiten on {{$post->created_at}} By {{$post->author}}</small>  
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- {{$post->links()}} --}}
        @else 
            <p class="alert alert-danger">No Post Found</p>
        @endif
    </div>    
@endsection
