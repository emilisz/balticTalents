@extends('layouts.app')
@section('content')

    <h1>Redaguoti grupę: {{$edit->name}}</h1>
    <br><br>
    <form action="{{route('groups.update', ['id' => $edit->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="number" class="form-control" id="" name="kursai_id" value="{{$edit->course_id}}">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" id="" name="destytojas_id" value="{{$edit->user_id}}">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="" name="pavadinimas" value="{{$edit->name}}">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" id="" name="pradzia" value="{{$edit->start_at}}">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" id="" name="pabaiga" value="{{$edit->end_at}}">
        </div>

        <br>
        <br>
        <h3>Studentai:</h3>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Vardas</th>
                <th scope="col">Pavardė</th>
            </tr>
            </thead>
            <tbody>
            @foreach($edit->students as $student)
                <tr>
                    <th scope="row">{{$student->name}}</th>
                    <td>{{$student->surname}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </form>

@endsection