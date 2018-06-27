<?php

namespace App\Http\Controllers;

use App\Course;
use \Validator;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
            'name' => 'required|max:45',
            'description' => 'required|max:225'
        ]);

        if ($validator->fails()) {
            return redirect('courses/create')
                ->withErrors($validator)
                ->withInput();
        }

        $course = new Course();

        $course->name = $request->name;
        $course->description = $request->description;
        $course->save();
        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Course::find($id);
        return view('courses.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:45',
            'description' => 'required|max:225'
        ]);

        if ($validator->fails()) {
            return redirect('courses/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }


        $group = Course::find($id);
        $group->name = $request->name;
        $group->description = $request->description;
//        $camping->updated_by = Auth::user()->name;
        $group->save();
        return redirect('/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect('/courses');
    }
}
