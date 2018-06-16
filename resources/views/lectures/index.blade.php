@extends('layouts.app')
@section('content')

    <h1>Paskaitos:</h1>
    <ol class="list-group">
        @foreach ($paskaitos->lectures as $paskaita)

            <li class="list-group-item d-flex justify-content-between align-items-center" >
                <a href="lectures/{{$paskaita->id}}">{{$paskaita->name}}</a>


                <span class="badge badge-primary badge-pill">{{count($paskaita->files)}}</span>
            </li>
        @endforeach
    </ol>
    <br>
    <a class="btn btn-primary" href="lectures/create">Įvesti naują paskaitą</a>
    <br>

@endsection