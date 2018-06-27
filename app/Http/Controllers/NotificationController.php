<?php

namespace App\Http\Controllers;

use App\Group;
use \Validator;
use App\Groups_messages;
use App\Message;
use App\Notifications\LessonUpdated;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
//        dd($id);
        return view('layouts.notification.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $grupe = Group::find($id);
        return view('layouts.notification.create', compact('grupe'));
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
            'grupe_id' => 'required',
            'author' => 'required',
            'name' => 'required|max:35',
            'description' => 'required|max:225'
        ]);

        if ($validator->fails()) {
            return redirect('groups/'.$request->grupe_id.'/notifications/create')
                ->withErrors($validator)
                ->withInput();
        }

        $studentai = Group::find($request->grupe_id)->students()->get();

        $group = new Message();

        $group->grupe_id = $request->grupe_id;
        $group->name = $request->name;
        $group->description = $request->description;
        $group->author = $request->author;
        $group->save();
        $lesson = DB::table('messages')->orderBy('created_at', 'desc')->get();

        foreach ($studentai as $student) {
            $student->notify(new LessonUpdated($lesson));
        }
        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('layouts.notification.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();

        return back();
    }
}
