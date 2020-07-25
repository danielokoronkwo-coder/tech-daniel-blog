@extends('layouts.app')
@section('content')
<main class="py-2">
    <div class="container">
        <div class="row justify-content-center text-center py-4">
            <div class="col-md-7 col-sm-12 text-center pb-4" height="80%">
                <h4>Hello, I'm Daniel Okoronkwo....</h4>
                <p>I am a Content creator, Wordpress Web developer, Full-stack Web developer</p>
                <h5>Follow me on all my Social Media handle</h5>
                <span><a href="https://www.facebook.com/daniel.okoronkwo.52
                    "><i class="fa fa-facebook-square fa-4x" aria-hidden="true"></i>
                </a></span>
                <span><a href="https://www.instagram.com/_danielokoronkwo"><i class="fa fa-instagram fa-4x" aria-hidden="true"></i>
                </a></span>
                <span><a href="https://www.twitter.com/@__software___"><i class="fa fa-twitter-square fa-4x" aria-hidden="true"></i>
                </a></span>
                <span><a href="https://www.linkedin.com/in/daniel-okoronkwo-a0a0821b2"><i class="fa fa-linkedin-square fa-4x" aria-hidden="true"></i>
                </a></span>
                <span><a href="https://github.com/danielokoronkwo-coder"><i class="fa fa-github-square fa-4x" aria-hidden="true"></i>
                </a></span>
            </div>
            <div class="col-md-5 col-sm-12 text-left pt-2">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{asset('img/Daniel -photo.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Daniel Okoronkwo</h5>
                      <a href="#" class="btn btn-primary">About Me</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row py-4">
            <div class="col-md-4 col-sm-12 my-2">
                I design and build beautiful Solution driven Software to make 
                life easier for everyone
            </div>
            <div class="col-md-4 col-sm-12 my-2">
                I love contributing to Open source 
            </div>
            <div class="col-md-4 col-sm-12 my-2">
                I am a self-taught developer, a product of many tech community
            </div>
        </div>
    </div>
</main>
@include('includes.footer')
@endsection