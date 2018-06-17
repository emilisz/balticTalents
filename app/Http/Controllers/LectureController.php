<?php

namespace App\Http\Controllers;

use App\Group;
use App\Lecture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

//        $this->validate($request, [
//            'group_id' => 'required',
//            'date' => 'required',
//            'name' => 'required',
//            'description' => 'required',
//            'file' => 'image|nullable|max:1999',
//        ]);

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

}   else {
    $fileNameToStore = 'noimage.jpg';
}

//        create lecture
        $lecture = new Lecture();
        $lecture->group_id = $request->group_id;
        $lecture->date = $request->date;
        $lecture->name = $request->name;
        $lecture->description = $request->description;
        $lecture->file = $fileNameToStore;


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
    if ($lecture->cover_image != 'noimage.jpg'){
    //    delete the image
        Storage::delete('public/cover_images/'.$lecture->file);
    }
        Lecture::destroy($id);
        return redirect('/groups');
    }
}
