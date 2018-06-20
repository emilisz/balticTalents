@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>{{$lecture->name}}</h3></li>
    </ul>
    <ul class="list-group">
        <li class="list-group-item">Sukurta:  {{$lecture->date}}</li>
        <li class="list-group-item">{!!  $lecture->description !!}</li>
    </ul>
    <br>
    @if($lecture->file != NULL)
    <div>
        <img style="width: 100%;" src="/storage/cover_images/{{$lecture->file}}">
    </div>
    <br>
    <a class="btn btn-success btn-outline" href="{{route('downloads.show',  ['id' => $lecture->id])}}" >Atsisiusti</a>
    @endif
    <br><br>
    <a class="btn btn-warning btn-sm" href="{{route('lectures.edit',  ['ide'=> $ide->id, 'id' => $lecture->id])}}">Redaguoti paskaitą</a>


    <form class="float-right" action="{{route('lectures.destroy',  ['ide'=> $ide->id, 'id' => $lecture->id])}}" method="POST">
        @method('DELETE')
        {{csrf_field()}}
        <input type="submit" class="btn btn-danger btn-sm" value="Trinti paskaitą">
    </form>
@endsection