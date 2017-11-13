@extends('layout')

@section('content')


    <form action=@if (empty($tag)) "{{route('tag.store')}}" method="POST">@else()
        "{{route('tag.update', ['id'=>$tag->id])}}" method="POST">@endif
    @if(!empty($tag))<input name="_method" type="hidden" value="PUT">@endif
        <p>
            <label for="titulo">Tag</label>
                <input type="text" name="Tag" value=@if (!empty($tag))"{{$tag->tag}}" >@else() "" @endif


            <input type="submit" value="Guardar" class="btn btn-success">

            {{csrf_field()}}
        </p>


    </form>