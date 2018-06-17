@extends('layouts.app')
@section('content')


<ul class="list-group">
    <li class="list-group-item list-group-item-dark"> <h3>Sukurti naują kursą:</h3></li>
</ul>


{!! Form::open(['action' => 'CourseController@store', 'method' => 'POST']) !!}
    <div class="form-group">
         {{ Form::label('name', 'Pavadinimas') }}
         {{ Form::text('name', '', ['class'=> 'form-control ', 'placeholder'=>' Kurso pavadinimas']) }}
    </div>
    <div class="form-group">
        {{ Form::textarea('description', '', ['class'=> 'form-control ckeditor', ]) }}
    </div>
{{Form::submit('Click Me!')}}
{!! Form::close() !!}

@endsection