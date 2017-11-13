@extends('layout')

@section('content')


    <h2>
        {{$section->section}}
    </h2>
    <div>
    <a href="{{route('section.edit',[$section->id])}}" class="btn btn-success">Edit</a>
    <form action="{{ route('section.destroy', ['id' => $section->id]) }}" method="POST" style="display: inline">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="DELETE">
        <input type="submit" value="Borrar" onclick="return confirm('Are you sure?');" class="btn btn-danger"/>
    </form>
    </div>

    </div>