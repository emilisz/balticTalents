@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>{{$lecture->name}}</h3></li>
    </ul>
    <ul class="list-group">
        <li class="list-group-item">Sukurta:  {{$lecture->date}}</li>
        <li class="list-group-item">
            {!!  $lecture->description !!}
        </li>
        <li class="list-group-item">
@if(Auth::user()->type === 1)
            <form action="{{route('groups.lectures.files.store',  ['ide'=> $ide->id, 'id' => $lecture->id])}}" method="POST", enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="lecture_id" value="{{$lecture->id}}">

                <div class="form-group">
                    <input type="file" name="file[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Pridėti failus</button>
            </form>
@endif
        </li>
    </ul>
    <br>

    @if(count($lecture->files) > 0)

    <br>
    @foreach($lecture->files as $file)
        @if($file->rodyti === 1 || Auth::user()->type === 1)
            <a class="btn btn-success btn-outline mt-3" href="{{route('downloads.show',  ['id' => $file->id])}}" >{{$file->failas}}</a>
    @endif


    @if(Auth::user()->type === 1)
    <div class="btn-group mt-3 float-right" role="group" aria-label="Basic example">

        <form action="{{route('groups.lectures.files.update', ['ide'=> $ide->id, 'id' => $lecture->id, 'ids' => $file->id])}}" method="POST">
            @method('PUT')
            {{csrf_field()}}

            @if($file->rodyti === 1)
                <input type="submit" class="btn btn-info " value="Failas matomas">
            @else
                <input type="submit" class="btn btn-secondary " value="Failas nematomas">
            @endif

        </form>
        <form action="{{route('groups.lectures.files.destroy', ['ide'=> $ide->id, 'id' => $lecture->id, 'ids' => $file->id])}}" method="POST">
            @method('DELETE')
            {{csrf_field()}}
            <input type="submit" class="btn btn-danger ml-1" value="Trinti">
        </form>

    </div>
    @endif






    <br>
    @endforeach
    @endif
    <br><br>
    @if(Auth::user()->type === 1)
    <a class="btn btn-warning btn-sm" href="{{route('groups.lectures.edit',  ['ide'=> $ide->id, 'id' => $lecture->id])}}">Redaguoti paskaitą</a>


    <form class="float-right" action="{{route('groups.lectures.destroy',  ['ide'=> $ide->id, 'id' => $lecture->id])}}" method="POST">
        @method('DELETE')
        {{csrf_field()}}
        <input type="submit" class="btn btn-danger btn-sm" value="Trinti paskaitą">
    </form>
    @endif
@endsection