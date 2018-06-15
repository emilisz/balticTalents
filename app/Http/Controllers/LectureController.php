<?php

namespace App\Http\Controllers;

use App\Group;
use App\Lecture;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $paskaitos = Group::find($id);
//        dd($paskaitos->lectures);

       return view('lectures.index', compact('paskaitos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $mytime = Carbon::now();
        $paskaitos = Group::find($id);

        return view('lectures.create', compact('mytime', 'paskaitos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lecture = new Lecture();
        $lecture->group_id = $request->group_id;
        $lecture->date = $request->date;
        $lecture->name = $request->name;
        $lecture->description = $request->description;


        $lecture->save();
        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show($ide, $id)
    {
        $ide = Group::find($ide);
        $lecture = Lecture::find($id);
        return view('lectures.show', compact('lecture', 'ide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit( $ide, $id)
    {
        $mytime = Carbon::now();
        $edit = Lecture::find($id);
        $ide = Group::find($ide);

        return view('lectures.edit', compact('edit', 'ide', 'mytime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$ide, $id)
    {
        $lecture = Lecture::find($id);
        $lecture->group_id = $request->group_id;
        $lecture->date = $request->date;
        $lecture->name = $request->name;
        $lecture->description = $request->description;


        $lecture->save();
        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy($ide, $id)
    {

        Lecture::destroy($id);
        return redirect('/groups');
    }
}
