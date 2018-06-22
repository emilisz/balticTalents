<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckAdmin')->only('index','create', 'store', 'edit', 'update', 'destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('type', '=', '2')->get();
       return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new User();

        $student->type = 2;
        $student->name = $request->name;
        $student->surname = $request->surname;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->save();
        return redirect('/users');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::find($id);
        return view('users.edit', compact('student'));
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

        $user = User::where('email', '=', Input::get('email'))->exists();
        $user1 = User::where('email', '=', Input::get('email'))->first();

        $group = User::find($id);
        $group->type = 2;
        $group->name = $request->name;
        $group->surname = $request->surname;
        if ($user === false) {
            $group->email = $request->email;
        } elseif (($user === true && $user1->email === Auth::user()->email) || Auth::user()->type === 1) {
            $group->email = $request->email;
        } elseif ($user === true && $user1->email != Auth::user()->email) {
            return 'email already taken';
        }
        $group->save();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/users');
    }
}
