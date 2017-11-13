@extends('layout')
@section('content')
    <h2>
        {{$post->title}}
    </h2>
    <div class="body">
        {{$post->body}}
    </div>
    <div class="date">
        {{$post->create_at}}
    </div>
    <div class="section">
        <span class="label">Seccion:</span>
        <a href="{{ route('section.show', [$post->section()->id]) }}">
            {{$post->section()-section}}
        </a>
    </div>
    <div class="tags">
        @foreach($post->tags() as $tags)
            <a href="{{route('tad.show', [$tags->is])}}">
                {{$tags->tag}}
            </a>
        @endforeach
    </div>
@endsection
