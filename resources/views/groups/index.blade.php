@extends('layouts.app')
@section('content')

<h1 class="text-center">Baltic talents school management system</h1>
<br>
    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Visos Baltic Talents grupės</h3></li>
    </ul>
    <ul class="list-group">
        @foreach($groups as $group)

            @if(Auth::check() &&  ($group->students->contains(Auth::user()->id) || Auth::user()->type === 1))
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="groups/{{$group->id}}"><i class="fas fa-users"></i> {{$group->name}}</a>
            <span class="badge badge-primary badge-pill">{{count($group->students)}}</span>
        </li>
@endif
            @endforeach
    </ul>
    <br>
    @if(Auth::check() &&   Auth::user()->type === 1)
    <a class="btn btn-primary" href="/groups/create">Įvesti naują grupę</a>
    @endif
    <br>

@endsection