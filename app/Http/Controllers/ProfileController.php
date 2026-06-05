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
    
     public function update_password(Request $request){
        $user = User::find(session('user')->id);

        if(!password_verify($request->current_password, $user->password)){
            return back()->with('error', 'Current password is incorrect.');
        }

        if($request->new_password !== $request->new_password_confirmation){
            return back()->with('error', 'New passwords do not match.');
        }

        if(strlen($request->new_password) < 8){
            return back()->with('error', 'Password must be at least 8 characters.');
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        session(['user' => $user->fresh()]);

        return back()->with('success', 'Password changed successfully!');
    }
}