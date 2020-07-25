@extends('layouts.app')
@section('content')
    <div class="container my-2">
        <a href="/posts" class="btn btn-secondary" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i>
        </i> Back</a>
        <div class="well" style="width: 80%;">
        <h1 class="my-4">{{$post->title}}</h1>
        <img style="width: 100%; height:100%;" src="/storage/cover_image/{{$post->cover_image}}" alt="Post Image" class="img-fluid">
        <div class="my-2">
            {!!$post->content!!}
        </div>
        <hr>
        <small>Wriiten on {{$post->created_at}}  By {{$post->author}}</small>
        <hr>
        @if (!Auth::guest())
            @if (Auth::user()->id ==$post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
            {!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
                {{ Form::hidden('_method', 'DELETE' ) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {!! Form::close() !!}
            @endif
        @endif
    </div>
    </div>    
@endsection
