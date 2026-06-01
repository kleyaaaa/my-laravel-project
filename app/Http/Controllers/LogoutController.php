<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        session()->forget('user');
        return redirect('/login')->with('success', 'Successful!');
    }
}