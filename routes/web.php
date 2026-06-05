<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LogoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Register
Route::post('/register', [AuthController::class, 'register']);

// Login Page
Route::get('/login', [AuthController::class, 'showLogin'])->name('signin');

Route::post('login', [AuthController::class, 'login']);

// dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard');

//users
Route::get('/user', [UserController::class, 'User'])->name('user');

Route::post('/users', [UserController::class, 'addUser'])->name('users.add');

Route::post('/user/update/{id}', [UserController::class, 'update']);

Route::post('/user/delete/{id}', [UserController::class, 'deleteUser']);

// item list
Route::get('/todo', [ToDoController::class, 'showToDo'])->name('todo');

Route::post('/todo', [ToDoController::class, 'ToDo'])->name('add.todo');

Route::post('to_do/update/{id}', [ToDoController::class, 'updateToDo']);

Route::post('to_do/delete/{id}', [ToDoController::class, 'deleteToDo']);

//profile
Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('displayProfile');

//Update Profile
Route::post('/updateProfile', [ProfileController::class, 'update_profile']);

//logout
Route::get('/logout', [LogoutController::class, 'logout']);



