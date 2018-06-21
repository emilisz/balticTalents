@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Paskaitos:</h3></li>
    </ul>
    <ol class="list-group">
        @foreach ($paskaitos->lectures as $key=>$paskaita)

            <li class="list-group-item d-flex justify-content-between align-items-center" >
                <a href="lectures/{{$paskaita->id}}">{{$key+1}}.  {{$paskaita->name}}</a>
                <a href="lectures/{{$paskaita->id}}"> <i class="fas fa-angle-double-right"></i></a>



            </li>
        @endforeach
    </ol>
    <br>
    @if(Auth::user()->type === 1)
    <a class="btn btn-primary" href="lectures/create">Įvesti naują paskaitą</a>
    @endif
    <br>

@endsection