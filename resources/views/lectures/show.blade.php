@extends('layouts.app')
@section('content')

    <h2 class="text-center"><strong> {{$lecture->name}}</strong>  </h2>
    <br>

    <ul class="list-group">
        <li class="list-group-item">Sukurta:  {{$lecture->date}}</li>
        <li class="list-group-item">{{$lecture->description}}</li>
    </ul>

@endsection