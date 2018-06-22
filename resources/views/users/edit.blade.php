@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>{{$student->name}} {{$student->surname}}</h3></li>
    </ul>
    <form action="{{route('users.update', ['id' => $student->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Studento vardas</label>
            <input type="text" class="form-control" id="" name="name" value="{{$student->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Pavardė</label>
            <input type="text" class="form-control" id="" name="surname" value="{{$student->surname}}">
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">el.paštas</label>
            <input type="text" class="form-control" id="" name="email" value="{{$student->email}}">
        </div>



        <br><br>
        <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </form>

@endsection