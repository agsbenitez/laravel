@extends('layout')

@section('content')


    <form action=@if (empty($section)) "{{route('section.store')}}" method="POST">@else()
        "{{route('section.update', ['id'=>$section->id])}}" method="POST">@endif
    @if(!empty($section))<input name="_method" type="hidden" value="PUT">@endif
        <p>
            <label for="titulo">Seccion </label>
                <input type="text" name="section" value=@if (!empty($section))"{{$section->section}}" >@else() "" @endif>


            <input type="submit" value="Guardar" class="btn btn-success">

            {{csrf_field()}}
        </p>


    </form>