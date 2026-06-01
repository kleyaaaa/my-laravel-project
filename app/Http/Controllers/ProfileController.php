<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    //
    public function showProfile(){
        return view('profile');
    }

    public function update_profile(Request $request){
        $user = User::find(session('user')->id);

        if($request->hasFile('profile')){
            
            $filename = $request->file('profile');

            $newfilename = time() . $filename->getClientOriginalExtension();

            $filename->move(public_path('uploads'), $newfilename);

            $user->profile_pic = $newfilename;
        }

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        session([ 'user' => $user]);

        return back()->with('success', 'User Profile updated successfully');
    }
}