@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>{{$lecture->name}}</h3></li>
    </ul>
    <ul class="list-group">
        <li class="list-group-item">Sukurta:  {{$lecture->date}}</li>
        <li class="list-group-item">
            {!!  $lecture->description !!}

            <form action="{{route('files.store')}}" method="POST", enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="lecture_id" value="{{$lecture->id}}">

                <div class="form-group">
                    <input type="file" name="file[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Pridėti failus</button>
            </form>

        </li>
    </ul>
    <br>
{{--{{dd(count($lecture->files))}}--}}
    @if(count($lecture->files) > 0)

    <br>
    @foreach($lecture->files as $file)
    <a class="btn btn-success btn-outline mt-1" href="{{route('downloads.show',  ['id' => $file->id])}}" >{{$file->failas}}</a>

    <form class="float-right btn" action="{{route('files.update',  ['ide'=> $ide->id, 'id' => $lecture->id])}}" method="POST">
        @method('PUT')
        {{csrf_field()}}
        <input type="submit" class="btn btn-warning btn-sm" value="Nerodyti">
    </form>
    <br>
    @endforeach
    @endif
    <br><br>
    @if(Auth::user()->type === 1)
    <a class="btn btn-warning btn-sm" href="{{route('lectures.edit',  ['ide'=> $ide->id, 'id' => $lecture->id])}}">Redaguoti paskaitą</a>


    <form class="float-right" action="{{route('lectures.destroy',  ['ide'=> $ide->id, 'id' => $lecture->id])}}" method="POST">
        @method('DELETE')
        {{csrf_field()}}
        <input type="submit" class="btn btn-danger btn-sm" value="Trinti paskaitą">
    </form>
    @endif
@endsection