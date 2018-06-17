@extends('layouts.app')
@section('content')

    <h2 class="text-center"><strong> {{$lecture->name}}</strong>  </h2>
    <br>

    <ul class="list-group">
        <li class="list-group-item">Sukurta:  {{$lecture->date}}</li>
        <li class="list-group-item">{!!  $lecture->description !!}</li>
    </ul>
    <br>
    <div>
        <img style="width: 100%;" src="/storage/cover_images/{{$lecture->file}}">
    </div>
    <br><br>
    <a class="btn btn-warning btn-sm" href="{{route('lectures.edit',  ['ide'=> $ide->id, 'id' => $lecture->id])}}">Redaguoti paskaitą</a>


    <form class="float-right" action="{{route('lectures.destroy',  ['ide'=> $ide->id, 'id' => $lecture->id])}}" method="POST">
        @method('DELETE')
        {{csrf_field()}}
        <input type="submit" class="btn btn-danger btn-sm" value="Delete">
    </form>
@endsection