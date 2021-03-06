@extends('layouts.app')
@section('content')


<ul class="list-group">
    <li class="list-group-item list-group-item-dark"> <h3>Sukurti naują grupę:</h3></li>
</ul>
<form action="/groups" method="POST">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" id="" name="pavadinimas" placeholder="Įveskite grupės pavadinimą" >
    </div>
    <div class="form-group">
        <select class="form-control" name="destytojas_id" >
            <option  selected disabled>Pasirinkite dėstytoją</option>

            @foreach($destytojas as $course)
                <option value="{{$course->id}}">{{$course->name}} {{$course->surname}}</option>
            @endforeach

        </select>
    </div>

    <div class="form-group">
        <select class="form-control" name="kursai_id" >
            <option selected disabled placeholder="Įveskite kursu id">Pasirinkite kursą</option>
            @foreach($courses as $course)
                <option value="{{$course->id}}">{{$course->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <input type="date" class="form-control" id="" name="pradzia" placeholder="Įveskite kursu pradzia" min="{{$time}}" max="{{$time3}}" >
    </div>
    <div class="form-group">
        <input type="date" class="form-control" id="" name="pabaiga" placeholder="Įveskite kursu pabaiga" min="{{$time2}}" max="{{$time3}}" >
    </div>

    <button type="submit" class="btn btn-primary">Sukurti</button>
</form>

@endsection