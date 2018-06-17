@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Visi Baltic talents kursai:</h3></li>
    </ul>
    <ul class="list-group">
        @foreach($courses as $course)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a class="" href="courses/{{$course->id}}">{{$course->name}}</a>
            <div class="float-right">
            <a class="btn btn-warning btn-sm" href="/courses/{{$course->id}}/edit">Redaguoti</a>

                <form class="float-right ml-2" action="{{route('courses.destroy',  ['id' => $course->id])}}" method="POST">
                    @method('DELETE')
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-danger btn-sm" value="Trinti">
                </form>
            </div>
        </li>
            @endforeach
    </ul>
    <br>
    <a class="btn btn-primary" href="/courses/create">Įvesti naują kursą</a>
@endsection