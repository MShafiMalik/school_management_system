<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function view()
    {
        $users = User::all();
        return view('admin.users.view', compact('users'));
    }

    public function add()
    {
        return view('admin.users.add');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                'username' => 'required|max:255',
                'email' => 'required|max:255|unique:users',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required|min:8',
                'user_type' => 'required'
            ]
        );

        $users = new User;
        $users->name = $request->username;
        $users->usertype = $request->user_type;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();

        return Redirect()->route('user.view')->with('success', 'User Added Successfully');

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate(
            [
                'username' => 'required|max:50',
                'email' => 'required',
                'user_type' => 'required'
            ]
        );

        $user = User::find($id);
        $user->name = $request->username;
        $user->usertype = $request->user_type;
        $user->email = $request->email;
        $user->save();

        $notification = array(
            "message" => "User Updated Successfully",
            "alert-type" => 'info'
        );

        return Redirect()->route('user.view')->with($notification);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        $notification = array(
            "message" => "User Deleted Successfully",
            "alert-type" => 'info'
        );
        return Redirect()->route('user.view')->with($notification);
    }
}
