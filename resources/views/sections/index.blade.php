@extends('layout')

@section('content')
    <div>
        <a href="{{route('section.create')}}" class="btn btn-success">Nueva Sección</a>
    </div>
    @foreach($sections as $sec)
        <div>
            <a href="{{route('section.show',[$sec->id])}}">{{$sec->section}}</a>
        </div>
    @endforeach

    @if(session('ok'))
        <div>{{session('ok')}}</div>
    @elseif(session('error'))
        <h2>{{session('error')}}</h2>
    @endif


@endsection