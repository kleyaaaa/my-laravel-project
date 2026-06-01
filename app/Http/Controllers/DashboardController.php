<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\ToDo;

class DashboardController extends Controller
{
    public function showDashboard() {
        $usercount = User::count();
        $todocount = ToDo::count();

        return view('dashboard', compact('usercount', 'todocount'));
    }
}