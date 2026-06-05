<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    public function showToDo() {
        $todos = ToDo::where('user_id', session('user')->id)->get();
        return view('todo', compact('todos'));
    }
    public function showUser() {
        $todos = ToDo::all();
        return view('todo', compact('todos'));
    }
    // For adding of record
   public function ToDo(Request $request){
    $sessionUser = session('user');

    if(!$sessionUser){
        return back()->with('error', 'Not logged in.');
    }

    // Re-fetch user from DB to make sure it exists
    $user = \App\Models\User::find($sessionUser->id);

    if(!$user){
        // Clear stale session and redirect to login
        session()->forget('user');
        return redirect('/login')->with('error', 'Session expired. Please login again.');
    }

    ToDo::create([
        'user_id'      => $user->id,
        'product_name' => $request->product_name,
        'category'     => $request->category,
        'quantity'     => $request->quantity,
        'price'        => $request->price,
    ]);

    return redirect()->route('todo.show')->with('success', 'Product added successfully!');

}

    // deletion of record
    public function deleteToDo($id){
        $todo = ToDo::where('id', $id)
        ->where('user_id', session('user')->id)
        ->first();

        if(!$todo){
            return back()->with('error', 'Unable to delete item');
        }
            $todo->delete();

            return back()->with('success', 'Item deleted successfully!');
        }

        //updating of record
        public function updateToDo(Request $request, $id){
            $todo = ToDo::where('id', $id)
            ->where('user_id', session('user')->id)
            ->first();

            if(!$todo){
            return back()->with('error', 'Unable to update item');
        }

            $todo->update([
                'product_name' => $request->product_name,
                'category'     => $request->category,
                'quantity'     => $request->quantity,
                'price'        => $request->price,
            ]);

            return back()->with('success', 'Item updated successfully!');
        }
}