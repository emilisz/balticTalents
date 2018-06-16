@extends('layouts.app')
@section('content')

    <h1>Sukurti naują paskaitą:</h1>
    <br><br>
    <form action="/groups/{ide}/lectures" method="POST">
        @csrf
        <input type="hidden" name="group_id" value="{{$paskaitos->id}}">
        <input type="hidden" name="date" value="{{ $mytime->toDateTimeString()}}">


        <div class="form-group">
            <label for="name">Pavadinimas</label>
            <input type="text" class="form-control" id="" name="name" placeholder="Įveskite pavadinimą">
        </div>
        <div class="form-group">
            <label for="description">Aprašymas</label>
            <textarea type="text" class="form-control ckeditor" id="" name="description" ></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Sukurti</button>
    </form>

@endsection