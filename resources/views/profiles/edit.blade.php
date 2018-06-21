@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Redaguoti profilį:</h3></li>
    </ul>
    <br><br>
    <form action="{{route('profiles.update', ['id' => $user->id])}}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <input type="text" class="form-control" id="" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="" name="surname" value="{{$user->surname}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="" name="email" value="{{$user->email}}">
        </div>



        <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </form>



@endsection