@extends('layouts.app')
@section('content')

    <h1>{{$grupe->name}}</h1>
    <br>
    <table class="table">
        <tbody>
        <tr>
            <th scope="row">Kursas</th>
            <td>
                @foreach($grupe->courses as $kursai)
                    {{$kursai->name.", "}}
                @endforeach
            </td>
        </tr>

        <tr>
            <th scope="row">Pradžia</th>
            <td>{{$grupe->start_at}}</td>
        </tr>
        <tr>
            <th scope="row">Pabaiga</th>
            <td>{{$grupe->end_at}}</td>
        </tr>
        <tr>
            <th scope="row">Dėstytojas</th>
            <td>{{$grupe->teacher->name}}</td>
        </tr>

        </tbody>
    </table>
    <hr>
    <br>

    <a class="btn btn-warning" href="/groups/{{$grupe->id}}/edit">Redaguoti grupę</a>
    <a class="btn btn-danger" href="/groups/{{$grupe->id}}/edit">Trinti</a>
    <br><br>
    <h3>Studentai:</h3>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Vardas</th>
            <th scope="col">Pavardė</th>
            <th scope="col">El.paštas</th>

        </tr>
        </thead>
        <tbody>
        @foreach($grupe->students as $student)
        <tr>
            <th scope="row">{{$student->name}}</th>
            <td>{{$student->surname}}</td>
            <td>{{$student->email}}</td>

        </tr>
            @endforeach

        </tbody>
    </table>




    <br>
    <br>
    <a class="btn btn-info mt-3" href="/groups">Atgal</a>

@endsection