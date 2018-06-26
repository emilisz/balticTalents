@extends('layouts.app')
@section('content')

    <h1 class="text-center">Žinutės</h1>
    <br>
    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Visos žinutės</h3></li>
    </ul>
    <ul class="list-group mt-3">
        @foreach(auth()->user()->unreadNotifications as $note)
{{--            {{dd($note->data[0]['name'])}}--}}
            <li class="list-group-item active">Žinutė nuo: {!!  $note->data[0]['author']!!} <span class="float-right">{!!  $note->data[0]['created_at']!!}</span></li>
            <li class="list-group-item "><strong>{!!  $note->data[0]['name']!!}</strong></li>
        <li class="list-group-item mb-2">{!!  $note->data[0]['description']!!} </li>
        @endforeach

    </ul>

    <form method="POST" action="notifications/{{Auth::user()->id}}">
        {{ method_field('DELETE')}}
        {{csrf_field()}}
        <button class="btn btn-danger" type="submit">Žymėti kaip perskaitytą</button>
    </form>
    <br>


@endsection