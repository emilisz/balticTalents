@extends('layouts.app')
@section('content')

    <h1>Redaguoti kursą:</h1>
    <br><br>
    <form action="{{route('courses.update', ['id' => $edit->id])}}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <input type="text" class="form-control" id="" name="pavadinimas" value="{{$edit->pavadinimas}}">
        </div>

        <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </form>

@endsection