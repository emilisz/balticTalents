@extends('layouts.app')
@section('content')


    <table class="table table-light">
        <thead class="thead-light">
        <tr>
            <th scope="col"></th>
            <th scope="col"><h4>{{$grupe->name}}</h4></th>
            <th scope="col"></th>

        </tr>
        </thead>
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

    <a class="btn btn-warning btn-sm" href="/groups/{{$grupe->id}}/edit">Redaguoti grupę</a>


    <form class="float-right" action="{{route('groups.destroy',  ['id' => $grupe->id])}}" method="POST">
        @method('DELETE')
        {{csrf_field()}}
        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
    </form>
    <br><br>
    <a class="btn btn-success" href="{{$grupe->id}}/lectures">Visos paskaitos</a>

    <br><br>
    <h3>Studentai:</h3>
    <table class="table table-light">
        <thead class="thead-light">
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