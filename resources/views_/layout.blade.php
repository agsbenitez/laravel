<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Mega Blog</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="top-right links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('section.index') }}">Sections</a>
        <a href="{{ route('tag.index') }}">Tags</a>
        @auth
            <a href="{{ url('/admin/posts') }}">Edit Posts</a>
            <a href="{{ url('/admin/sections') }}">Edit Sections</a>
            <a href="{{ url('/admin/tags') }}">Edit Tags</a>
            <a href="">Logout</a>
            @else
                <a href="">Login</a>
                @endauth
    </div>

    <div class="content">
        <h1 class="title m-b-md">
            @section('title')
                Mi Mega Blog
            @show
        </h1>

        @section('content')
            Welcome! :)
        @show
    </div>
</div>
</body>
</html>
