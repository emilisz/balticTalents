<?php

namespace App\Http\Controllers;

use App\Course;
use App\Group;
use App\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $destytojas = User::where('type' , 1)->get();
        return view('groups.create', compact('courses', 'destytojas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group();
        $group->course_id = $request->kursai_id;
        $group->user_id = $request->destytojas_id;
        $group->name = $request->pavadinimas;
        $group->start_at = $request->pradzia;
        $group->end_at = $request->pabaiga;


        $group->save();
        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupe = Group::find($id);
//dd($grupe->students);
        return view('groups.show', compact('grupe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Group::find($id);
        return view('groups.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $group = Group::find($id);
        $group->course_id = $request->kursai_id;
        $group->user_id = $request->destytojas_id;
        $group->name = $request->pavadinimas;
        $group->start_at = $request->pradzia;
        $group->end_at = $request->pabaiga;


        $group->save();
        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
