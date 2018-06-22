<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->hasFile('file')) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $file->move(public_path().'/uploads', $filename);
                $file = new File();
                $file->failas = $filename;
                $file->lecture_id = $request->lecture_id;
                $file->rodyti = 1;
                $file->save();

            }
        }




        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($ide,$id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $ide
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$ide, $id)
    {
dd($ide);
        $file = File::find($request->id);
        if ($file->rodyti = 1){
            $file->rodyti = 2;
        } else {
            $file->rodyti = 1;
        }

        $file->save();
        return redirect('/groups/'.$ide.'/lectures'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
