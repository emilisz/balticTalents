@extends('layouts.app')
@section('content')

<h1>Sukurti naują kursą:</h1>
<br><br>


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