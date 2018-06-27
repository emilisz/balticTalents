@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>
                @if(Auth::user()->type === 1)
               Dėstytojas:  {{Auth::user()->name}}
                @else
                    Studentas:  {{Auth::user()->name}}
                    @endif
            </h3></li>
    </ul>


<table class="table table-dark">
    <thead>
    <tr>

        <th scope="col">Vardas</th>
        <th scope="col">{{$user->name}}</th>

    </tr>
    </thead>
    <tbody>
    <tr>

        <td>Pavardė</td>
        <td>{{$user->surname}}</td>
    </tr>
    <tr>

        <td>El.paštas</td>
        <td>{!!  $user->email !!}</td>
    </tr>
    <tr>

        <td>Sukurta</td>
        <td>{!!  $user->created_at !!}</td>
    </tr>
    </tbody>
</table>


@if(Auth::user()->id === $user->id)
        <a class="btn btn-warning btn-sm" href="{{route('profiles.edit',  [ 'id' => $user->id])}}">Redaguoti</a>

@endif

@endsection