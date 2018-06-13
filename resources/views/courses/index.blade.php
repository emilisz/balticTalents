@extends('layouts.app')
@section('content')

    <h1>Visi Baltic talents kursai:</h1>
    <ul class="list-group">
        @foreach($courses as $course)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="btn btn-info btn-sm" href="courses/{{$course->id}}">{{$course->pavadinimas}}</a>
            <div class="float-right">
            <a class="btn btn-warning btn-sm" href="/courses/{{$course->id}}/edit">Redaguoti</a>
            <a class="btn btn-danger btn-sm" href="/courses/{{$course->id}}/edit">Trinti</a>
            </div>
            {{--<span class="badge badge-primary badge-pill">14</span>--}}
        </li>
            @endforeach
    </ul>
    <br>
    <a class="btn btn-primary" href="/courses/create">Įvesti naują kursą</a>
@endsection