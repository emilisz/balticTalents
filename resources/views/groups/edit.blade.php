@extends('layouts.app')
@section('content')

    <h1>Redaguoti grupę: {{$edit->name}}</h1>
    <br><br>
    <form action="{{route('groups.update', ['id' => $edit->id])}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Grupės pavadinimas</label>
            <input type="text" class="form-control" id="" name="pavadinimas" value="{{$edit->name}}">
        </div>



        <label for="exampleInputEmail1">Kursų pavadinimas</label>
@foreach ($edit->courses as $kursas)
        <div class="form-group">
            <select name="kursai_id" class="form-control"  >
                <option name="kursai_id" value="{{$kursas->id}}">{{$kursas->name}}</option>

                @foreach($courses as $Gkursas)
                    <option name="kursai_id" value="{{$Gkursas->id}}">{{$Gkursas->name}}</option>
                @endforeach
            </select>
        </div>
        @endforeach



        <div class="form-group">
            <label for="exampleInputEmail1">Dėstytojas</label>
            <select class="form-control" name="user_id" >
                <option name="user_id" value="{{$edit->teacher->id}}">{{$edit->teacher->name}}</option>
                @foreach($teachers as $teacher)
                    <option name="user_id" value="{{$teacher->id}}">{{$teacher->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Kursų pradžia</label>
            <input type="date" class="form-control" id="" name="pradzia" value="{{$edit->start_at}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Kursų pabaiga</label>
            <input type="date" class="form-control" id="" name="pabaiga" value="{{$edit->end_at}}">
        </div>

        <br>
        <br>
        <h3>Studentai:</h3>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Vardas</th>
                <th scope="col">Pavardė</th>
                <th scope="col">Šalinti studentus</th>
            </tr>
            </thead>
            <tbody>
            @foreach($edit->students as $stud)
                <tr>
                    <th scope="row">{{$stud->name}}</th>
                    <td>{{$stud->surname}}</td>
                    <th><input type="checkbox" id="inlineCheckbox1" name="my_checkbox[]" value="{{$stud->id}}"></th>
                </tr>
            @endforeach

            </tbody>
        </table>
        <hr>


        <!-- studentu pridejimas -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
            Pridėti studentus
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Grupės "{{$edit->name}}" pridėti studentus:</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
                                <th><input type="checkbox" id="inlineCheckbox1" name="my_checkbox1[]" value="{{$stud->id}}"></th>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary">Atnaujinti</button>
    </form>

@endsection