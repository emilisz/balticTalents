@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Paskaitos:</h3></li>
    </ul>
    <ol class="list-group">
        @foreach ($paskaitos->lectures as $key=>$paskaita)

            <li class="list-group-item d-flex justify-content-between align-items-center" >
                <a href="lectures/{{$paskaita->id}}">{{$key+1}}.  {{$paskaita->name}}</a>


                <span class="badge badge-primary badge-pill">{{count($paskaita->files)}}</span>
            </li>
        @endforeach
    </ol>
    <br>
    <a class="btn btn-primary" href="lectures/create">Įvesti naują paskaitą</a>
    <br>

@endsection