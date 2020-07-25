<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Favicon --}}
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/gif" sizes="16x16">

    {{-- Meta Information --}}
    {{-- facebook meta information --}}
    <meta property="og:title" content="Tech Daniel">
    <meta property="og:description" content="A blog for Developers.">
    <meta property="og:image" content="{{ asset('img/view.png') }}">
    <meta property="og:url" content="http://localhost:8000/">

    {{-- Twitter meta information --}}
    <meta name="twitter:title" content="Tech Daniel">
    <meta name="twitter:description" content="A blog for Developers.">
    <meta name="twitter:image" content="{{ asset('img/view.png') }}">
    <meta name="twitter:card" content="{{ asset('img/view.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('webfonts/font-awesome.scss')}}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body  onload="document.body.style.opacity='1'">
    @include('includes.navbar')
        {{-- Navigation stops here --}}
    <main class="role">
        <div class="container my-2">
            @include('includes.messages')
        </div>
        {{-- <div class="text-center" id="spinner">
            <div class="spinner-border text-primary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        @yield('content')
    </main>
    {{-- @include('includes.footer') --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    {{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
    <script>
        CKEDITOR.replace( 'summary-ckeditor');
    </script>
</body>
</html>
