@extends('layouts.app')
@section('content')

    {{--<h1>Redaguoti grupę: {{$edit->name}}</h1>--}}
    <br><br>
    <form action="/students" method="POST">
        @method('PUT')
        @csrf

        <h3>Studentai:</h3>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Vardas</th>
                <th scope="col">Pavardė</th>
                <th scope="col">Pasirinkti studentus</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $stud)
                <tr>
                    <th scope="row">{{$stud->name}}</th>
                    <td>{{$stud->surname}}</td>
                    <th><input type="checkbox" id="inlineCheckbox1" name="my_checkbox[]" value="{{$stud->id}}"></th>
                </tr>
            @endforeach

            </tbody>
        </table>
        <hr>

        <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </form>

@endsection