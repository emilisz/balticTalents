@extends('layouts.app')
@section('content')

    <h2>Paskaita: <strong> {{$lecture->name}}</strong>  </h2>
    <br>

    <ul class="list-group">

        <li class="list-group-item">{{$lecture->description}}</li>
    </ul>

@endsection