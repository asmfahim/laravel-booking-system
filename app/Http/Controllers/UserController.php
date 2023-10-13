<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $roles = Role::all();
        return view('pages.user-view',compact('user','roles'));

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

        $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required | max:255|email |unique:users,email',
            'password' => 'required | min:8 | confirmed',
        ], [
            'fname.requried' => 'Please give a user first name',
            'lname.requried' => 'Please give a user last name',
            'email.requried' => 'Please give an email address',
            'password.requried' => 'Please give a password',
            'password.confirmed' => 'Password must be same',

        ]);

        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if($request->role){
            $user->assignRole($request->role);
        }
        session()->flash('success', 'User has been created !!');
        return redirect()->route('user.index');

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
        $user = User::find($id);
        $roles = Role::all();
        return view('pages.user-edit',compact('user','roles'));
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
        $user = User::find($id);

        // Validation Data
        $request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|max:255|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',

        ]);

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->role) {
            $user->assignRole($request->role);
        }

        session()->flash('success', 'User has been updated !!');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        session()->flash('success', 'User has been deleted !!');
        return back();
    }
}
