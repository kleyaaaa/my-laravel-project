<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){

        //Select * form users where email = 'email'
        //If the email is already existed
        if(User::where('email', $request->email)->exists()){
            return back()->with('error', 'Email already exists!');
        }
        //This checks if the password is not equal to the confirmpassword
        if($request->password !== $request->confirmpassword){
            return back()->with('error', 'Password do not match!');
        }

        //Insert into users table
        User::create([
            'name' => $request->fullname,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'profile_pic'=> $request->profile_pic
        ]);

        return back()->with('success', 'Account successfully created!');
    }

    public function showLogin(){
        return view ('login');
    }

    public function login(Request $request){

        //Select * form users where email = 'email'
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return back()->with('error', 'Invalid credentials!');
        }

        session(['user' => $user]);

        return redirect('/dashboard')->with('success', 'Login successful!');

    }

}