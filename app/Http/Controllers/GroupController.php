<?php

namespace App\Http\Controllers;

use App\Course;
use App\Group;
use App\Groups_messages;
use App\Notifications\Newmessage;
use App\User;
use \Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckAdmin')->only('create', 'store', 'edit', 'update', 'destroy');
    }
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
        $time = Carbon::now()->toDateString();
        $time2 = Carbon::now()->addDay()->toDateString();
        $time3 = Carbon::now()->addYear()->toDateString();
        $courses = Course::all();
        $destytojas = User::where('type' , 1)->get();
        return view('groups.create', compact('courses', 'destytojas', 'time', 'time2', 'time3'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'pavadinimas' => 'required|max:25',
            'destytojas_id' => 'required',
            'kursai_id' => 'required',
            'pradzia' => 'required',
            'pabaiga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('groups/create')
                ->withErrors($validator)
                ->withInput();
        }

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


        $students = User::where('type' , 2)->get();
        $teachers = User::where('type' , 1)->get();
        $courses = Course::all();
        return view('groups.edit', compact('edit', 'students', 'teachers', 'courses'));
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

        $validator = Validator::make($request->all(), [
            'pavadinimas' => 'required|max:25',
            'user_id' => 'required',
            'kursai_id' => 'required',
            'pradzia' => 'required',
            'pabaiga' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('groups/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $group = Group::find($id);
        $group->user_id = $request->user_id;
        $group->course_id = $request->kursai_id;
        $group->name = $request->pavadinimas;
        $group->start_at = $request->pradzia;
        $group->end_at = $request->pabaiga;
//        studentu priskyrimas
        $student = $request->input('my_checkbox1');
        if (isset($student) && $student>0) {
            foreach ($student as $student) {
                $group->students()->attach($student);
            }
        }
//        studentu trynimas
        $myCheckboxes = $request->input('my_checkbox');
        if (isset($myCheckboxes)){
            foreach ($myCheckboxes as $key=>$value){
                $group->students()->detach($myCheckboxes[$key]);
            }
        }

        $group->save();
        return redirect('/groups/'.$group->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Group::destroy($id);
        return redirect('/groups');
    }
}
