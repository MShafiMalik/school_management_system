<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function view()
    {
        $user = Auth::user();
        return view('admin.profile.view', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $validateData = $request->validate(
            [
                'username' => 'required|max:50',
                'email' => 'required',
                'user_type' => 'required'
            ]
        );
        $data = User::find(Auth::user()->id);
        $data->name = $request->username;
        $data->email = $request->email;
        $data->usertype = $request->user_type;
        $data->gender = $request->gender;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        if($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('uploads/user_images/'.$data->image));
            $filename = date('YdmHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'), $filename);
            $data->image = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.view')->with($notification);
    }

    public function change_password()
    {
        return view('admin.profile.change_password');
    }

    public function update_password(Request $request)
    {
        $validateData = $request->validate(
            [
                'old_password' => 'required',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required|min:8',
            ]
        );

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPassword)) {
            $user = User::find(Auth::user()->id);
            // return $user;
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }

        return $request;
    }
}
