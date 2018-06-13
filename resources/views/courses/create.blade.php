@extends('layouts.app')
@section('content')

<h1>Sukurti naują kursą:</h1>
<br><br>
<form action="/courses" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" id="" name="pavadinimas" placeholder="Įveskite pavadinimą">
    </div>

    <button type="submit" class="btn btn-primary">Sukurti</button>
</form>

@endsection