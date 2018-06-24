@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Redaguoti paskaitą:</h3></li>
    </ul>
    <form action="{{route('groups.lectures.update', ['ide'=> $ide->id,'id' => $edit->id])}}" method="POST", enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="group_id" value="{{$ide->id}}">
        <input type="hidden" name="date" value="{{ $mytime->toDateTimeString()}}">
        <div class="form-group">
            <input type="text" class="form-control" name="name" value="{{$edit->name}}">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control ckeditor" name="description">{{$edit->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </form>

@endsection