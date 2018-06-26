@extends('layouts.app')
@section('content')


<ul class="list-group">
    <li class="list-group-item list-group-item-dark"> <h3>Sukurti naują žinutę:</h3></li>
</ul>



<form action="{{ action('NotificationController@store', ['id' => $grupe->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="grupe_id" value="{{$grupe->id}}">
    <input type="hidden" name="author" value="{{Auth::user()->name}}">



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