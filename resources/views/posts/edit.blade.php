@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        {!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST', "enctype" => 'multipart/form-data']) !!}
            <div class="form-group">
                {{ Form::label('title', 'Title',) }}
                {{ Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{ Form::label('content', 'Body',) }}
                {{ Form::textarea('content', $post->content, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Write a Post...'])}}
            </div>
            <div class="form-group">
                {!! Form::file('cover_image') !!}
            </div>
            {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::submit('Update', [ 'class' => 'btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
@endsection