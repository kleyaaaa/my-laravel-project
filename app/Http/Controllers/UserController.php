<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function User() {
        $users = User::all();
        return view('user', compact('users'));
    }

    // For adding user
    public function addUser(Request $request) {
        if(User::where('email', $request->email)->exists()){
            return back()->with('error', 'Account already exists!');
        }

        if($request->password !== $request->confirmpassword){
            return back()->with('error', 'Password do not match!');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'User added successfully!');
    }

    // For updating user
    public function update(Request $request, $id) {
    $user = User::where('id', $id)
        ->first();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return back()->with('success', 'User updated successfully!');
}

    // For deleting user
    public function deleteUser($id) {
        $user = User::where('id', $id);
        $user->delete();

        return back()->with('success', 'User deleted successfully!');
    }
}