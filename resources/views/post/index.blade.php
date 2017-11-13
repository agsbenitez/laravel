@extends('layout')

@section('content')
    <a href="{{route('post.create')}}" class="btn btn-success">Nuevo Post</a>
    @if(session('ok'))
        <div>{{session('ok')}}</div>
    @elseif(session('error'))
        <h2>{{session('error')}}</h2>
    @endif
    @foreach($posts as $post)
        @include('post.teaser')
    @endforeach
@endsection