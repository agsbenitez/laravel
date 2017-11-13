@extends('layout')

@section('content')
<h2>
    {{ $post->title }}
</h2>

{{$post->body}}

{{$post->section()->section}}
@foreach($post->tags() as $tags)
    {{$tags->tag}}
@endforeach

<div>
    <a href="{{route('post.edit',[$post->id])}}" class="btn btn-success">Edit</a>
    <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST" style="display: inline">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="DELETE">
        <input type="submit" value="Borrar" onclick="return confirm('Are you sure?');" class="btn btn-danger"/>
    </form>
</div>
