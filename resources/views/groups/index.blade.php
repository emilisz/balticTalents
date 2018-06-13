@extends('layouts.app')
@section('content')

    <h1>Visos Baltic Talents grupės</h1>
    <ul class="list-group">
        @foreach($groups as $group)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="groups/{{$group->id}}">{{$group->name}}</a>

            <span class="badge badge-primary badge-pill">{{count($group->students)}}</span>
        </li>
            @endforeach
    </ul>
    <br>
    <a class="btn btn-primary" href="/groups/create">Įvesti naują grupę</a>
    <br>

@endsection