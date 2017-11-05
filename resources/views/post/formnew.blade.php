@extends('layout')

@section('content')
    <form action="{{route('post.store')}}" method="post">
        <p>
            <label for="titulo">Titulo</label>
                <input type="text" name="title">
            <label for="cuerpo">Body</label>
            <textarea name="body"></textarea>
            <label for="seccion">Seccion</label>
            <select name="section">
                @foreach($secciones as $section)
                    <option value={{$section->id}}>{{$section['section']}}-</option>
                @endforeach
            </select>
            <input type="submit" value="Guardar">

            {{csrf_field()}}
        </p>


    </form>