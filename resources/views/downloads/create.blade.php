@extends('layouts.app')
@section('content')


    <ul class="list-group">
        <li class="list-group-item list-group-item-dark"> <h3>Pridėti failą prie paskaitos:</strong></h3></li>
    </ul>
    <br><br>
    {{--<form action="/downloads/{{$paskaita->id}}" method="POST", enctype="multipart/form-data">--}}
        {{--@csrf--}}
        {{--<input type="hidden" name="lecture_id" value="{{$paskaita->id}}">--}}

        {{--<div class="form-group">--}}
            {{--<input type="file" name="file[]" multiple>--}}
        {{--</div>--}}
        {{--<button type="submit" class="btn btn-primary">Sukurti</button>--}}
    {{--</form>--}}


    <form action="/upload" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        Product name:
        <br />
        <input type="text" name="name" />
        <br /><br />
        Product photos (can attach more than one):
        <br />
        <input type="file" name="photos[]" multiple />
        <br /><br />
        <input type="submit" value="Upload" />
    </form>

@endsection