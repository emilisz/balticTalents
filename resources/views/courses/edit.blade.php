@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Redaguoti kursą:</h3></li>
    </ul>
    <br><br>
    <form action="{{route('courses.update', ['id' => $edit->id])}}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <input type="text" class="form-control" id="" name="name" value="{{$edit->name}}">
        </div>

        <div class="form-group">
            <textarea type="text" class="form-control ckeditor" id="article-ckeditor" name="description" value="">{{$edit->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </form>



@endsection