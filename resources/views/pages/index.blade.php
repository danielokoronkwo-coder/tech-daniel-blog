@extends('layouts.app')
@section('content')
{{-- Carousel begins --}}
        <div id="myCarousel" class="carousel slide" data-ride="carousel" height="450px">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img/carousel-image0.jpg')}}" alt="Slider-image">
            <div class="container">
                <div class="carousel-caption">
                <h1>Welcome To Tech Daniel</h1>
                <p>Are you ready to make Impact?</p>
                <p><a class="btn btn-lg btn-primary" href="/register" role="button">Sign up today!</a></p>
                </div>
            </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/carousel-image1.jpg')}}" alt="Slider-image">
            <div class="container">
                <div class="carousel-caption">
                <h1>Ready to Explore</h1>
                <p>Writing a blog post opens your door to many opportunity. Ready to grab them?</p>
                <p><a class="btn btn-lg btn-primary" href="{{ route('about') }}" role="button">Learn more</a></p>
                </div>
            </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('img/carousel-image2.jpg')}}" alt="Slider-image">
            <div class="container">
                <div class="carousel-caption">
                <h1>Go For It</h1>
                <p>Explore contents made by experts in their niche.</p>
                <p><a class="btn btn-lg btn-primary" href="{{route('posts.index')}}" role="button">Browse gallery</a></p>
                </div>
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
        {{-- Carousel ends --}}
    <div class="container">
        <h3 class="lead">Recently Added</h3>
        <div class="row my-2 align-items-center">
            @if (count($posts) >= 0)
                @foreach ($posts as $post)
                    <div class="col-sm-12 col-md-4 mx-2 my-4 align-items-center">
                        <div class="card" style="width: 18rem;">
                                <img class="card-img-top" style="width: 100%" src="/storage/cover_image/{{$post->cover_image}}" alt="Post Image">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <small>Posted on {{$post->created_at}} by {{$post->author}}</small>
                            </div>
                            <div class="card-body">
                                <a href="/posts/{{$post->id}}" class="card-link">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <p>No Post yet</p>
            @endif
            <!-- /.col-lg-4 -->
        </div>
    </div>
@endsection