@extends('layouts.app')
@section('title')
    <li class="nav-item dropdown">
        <a class="nav-link " href="{{route('groups.notifications.index', ['id' => $grupe->id])}}"  role="button" >
            <i class="fas fa-envelope"></i>
            <span class="badge">{{count(auth()->user()->unreadNotifications)}}</span>
        </a>
    </li>

@endsection
@section('content')


    <table class="table table-light">
        <thead class="thead-light">
        <tr>
            <th scope="col"></th>
            <th scope="col"><h4> {{$grupe->name}}</h4></th>
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
            <td>{{$grupe->teacher->name}} {{$grupe->teacher->surname}}</td>
        </tr>

        </tbody>
    </table>
    <hr>
    @if(Auth::check() &&   Auth::user()->type === 1)
    <a class="btn btn-warning btn-sm" href="/groups/{{$grupe->id}}/edit">Redaguoti grupę</a>


    <form class="float-right" action="{{route('groups.destroy',  ['id' => $grupe->id])}}" method="POST">
        @method('DELETE')
        {{csrf_field()}}
        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
    </form>
    @endif
    <br><br><br>
    <a class="btn btn-success btn-lg" href="{{$grupe->id}}/lectures">Visos paskaitos  <span class="badge badge-danger badge-pill">{{count($grupe->lectures)}}</span></a>

    <br><br>
    <h3><i class="fas fa-users"></i> Studentai:</h3>
    @if(Auth::check() &&   Auth::user()->type === 1)
    <a class="btn btn-primary mb-2" href="{{$grupe->id}}/notifications/create"> Siųsti žinutę grupei</a>
    @endif
    <table class="table table-light">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Vardas</th>
            <th scope="col">Pavardė</th>
            <th scope="col">El.paštas</th>

        </tr>
        </thead>
        <tbody>
        @foreach($grupe->students as $key=> $student)
        <tr>
            <th scope="row">{{$key+1}}</th>
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