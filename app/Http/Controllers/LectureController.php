<?php

namespace App\Http\Controllers;

use App\File;
use App\Group;
use App\Lecture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use \Validator;

class LectureController extends Controller
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
        if(Auth::user()->type === 1){
            $mytime = Carbon::now();
            $paskaitos = Group::find($id);

        }


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

        $validator = Validator::make($request->all(), [
            'group_id' => 'required',
            'name' => 'required|max:35',
            'description' => 'required|max:350'
        ]);

        if ($validator->fails()) {
            return redirect('groups/'.$request->group_id.'/lectures/create')
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('file')) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path().'/uploads', $filename);
                $file = new File();
                $file->failas = $filename;
                $file->lecture_id = 2;
                $file->save();

            }
    }


//        create lecture
        $lecture = new Lecture();
        $lecture->group_id = $request->group_id;
        $lecture->date = $request->date;
        $lecture->name = $request->name;
        $lecture->description = $request->description;



        $lecture->save();

        return redirect('/groups/'.$lecture->group_id.'/lectures');
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

        $validator = Validator::make($request->all(), [
            'group_id' => 'required',
            'name' => 'required|max:35',
            'description' => 'required|max:350'
        ]);

        if ($validator->fails()) {
            return redirect('groups/'.$request->group_id.'/lectures/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }


        //        handle file upload
        if ($request->hasFile('file')){
            //get filename with the extension
            $fileNameWithExt = $request->file('file')->getClientOriginalName();
            //    get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //    get just extension (ext)
            $extension = $request->file('file')->getClientOriginalExtension();
            //    filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('file')->storeAs('public/cover_images', $fileNameToStore);

        }


        $lecture = Lecture::find($id);
        $lecture->group_id = $request->group_id;
        $lecture->date = $request->date;
        $lecture->name = $request->name;
        $lecture->description = $request->description;
        if ($request->hasFile('file')){

            $lecture->file = $fileNameToStore;
        }


        $lecture->save();
        return redirect('/groups/'.$ide.'/lectures');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy($ide, $id)
    {
$lecture = Lecture::find($id);
    if (count($lecture->files) > 0){
    //    delete the image
        Storage::delete('uploads/'.$lecture->file);
    }
        Lecture::destroy($id);
        if (count($lecture->files) > 0) {
            $file = File::where('lecture_id', '=', $id)->get();
            File::destroy($file);
        }
        return redirect('/groups');
    }
}
