@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Sukurti naują studentą:</h3></li>
    </ul>


    {!! Form::open(['action' => 'UserController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{ Form::label('name', 'Vardas') }}
        {{ Form::text('name', '', ['class'=> 'form-control ', 'placeholder'=>' Studento vardas', 'autofocus'=>'autofocus', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('surname', 'Pavardė') }}
        {{ Form::text('surname', '', ['class'=> 'form-control ', 'placeholder'=>' Studento pavardė', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'El. paštas') }}
        {{ Form::text('email', '', ['class'=> 'form-control ', 'type'=> 'email', 'placeholder'=>' Studento el.paštas', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Slaptažodis') }}
        {{ Form::text('password', '', ['class'=> 'form-control ', 'placeholder'=>' Studento prisijungimo slaptažodis', 'required']) }}
    </div>
    {{Form::submit('Sukurti!', ['class'=> 'btn btn-success'])}}
    {!! Form::close() !!}

@endsection