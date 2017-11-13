@extends('layout')

@section('content')
    <form action=@if (empty($post)) "{{route('post.store')}}" method="POST">@else()
        "{{route('post.update', ['id'=>$post->id])}}" method="POST">@endif
    @if(!empty($post))<input name="_method" type="hidden" value="PUT">@endif
        <p>
            <label for="titulo">Titulo </label>
                <input type="text" name="title" value=@if (!empty($post))"{{$post->title}}" @else() "" @endif>
            <label for="cuerpo">Body</label>
            <textarea name="body">@if (!empty($post)){{$post->body}} @endif</textarea>
            <label for="seccion">Seccion</label>
            <select name="section">
                @foreach($secciones as $section)
                    <option value={{$section->id}} @if(!empty($post) && $section->id == $post->section_id) selected="selected"@endif>{{$section['section']    }}-</option>
                @endforeach
            </select>
            @foreach($tags as $tag)
                <div>
                    <input type="checkbox" name="tags[]" value="{{$tag->id}}" @if (!empty($post) && $post->usesTag($tag)) checked="checked" @endif id="{{$tag->id}}"><label for="post">{{$tag['tag']}}</label>
                </div>
            @endforeach
            <input type="submit" value="Guardar" class="btn btn-success">


            {{csrf_field()}}
        </p>


    </form>