@extends('layout')

@section('content')
    <div>
        <a href="{{route('tag.create')}}" class="btn btn-success">Nuevo Tag</a>
    </div>
    @foreach($tag as $tags)
        <div>
            {{$tags->tag}}
            <a href="{{route('tag.edit',[$tags->id])}}" class="btn btn-success col-md-1 mr-1">Editar</a>
            <form action="{{ route('tag.destroy', ['id' => $tags->id]) }}" method="POST" style="display: inline">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <input type="submit" value="Borrar" onclick="return confirm('Are you sure?');" class="btn btn-danger"/>
            </form>
        </div>
    @endforeach

    @if(session('ok'))
        <div>{{session('ok')}}</div>
    @elseif(session('error'))
        <h2>{{session('error')}}</h2>
    @endif


@endsection