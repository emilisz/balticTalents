@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Visi studentai</h3></li>
    </ul>


    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Vardas</th>
            <th scope="col">Pavardė</th>
            <th scope="col">El.paštas</th>
            <th scope="col">Redaguoti</th>
            <th scope="col">Trinti</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $key=> $user)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td><a href="users/{{$user->id}}">{{$user->name}}</a></td>
            <td>{{$user->surname}}</td>
            <td>{{$user->email}}</td>
            <td><a class="btn btn-warning btn-sm" href="users/{{$user->id}}/edit">Redaguoti</a></td>
            <td>{{$user->email}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>


    <a class="btn btn-primary" href="/users/create">Įvesti naują studentą</a>
    <br>

@endsection