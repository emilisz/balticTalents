@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Kursas</h3></li>
    </ul>
    <table class="table">
        <tbody>
        <tr>
            <th scope="row">Pavadinimas</th>
            <td>{{$course->name}}</td>
        </tr>
        <tr>
            <th scope="row">Aprašymas</th>
            <td>{!!  $course->description !!}</td>
        </tr>


        </tbody>
    </table>
    <a class="btn btn-warning" href="/courses/{{$course->id}}/edit">Redaguoti</a>
    <br>
    <a class="btn btn-info mt-3" href="/courses">Atgal</a>

@endsection