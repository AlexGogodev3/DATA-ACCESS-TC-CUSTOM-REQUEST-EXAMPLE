<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Requests\DeleteTodoRequest;
use Auth;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function store(TodoRequest $request)
    {
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->user_id = Auth::user()->id;
        $todo->save();

        return redirect()->route('dashboard');
    }

    public function destroy(DeleteTodoRequest $request, $id)
    {
        $todo = Todo::FindOrFail($id);       
        $todo->delete();
        return redirect()->route('dashboard');
    }

}
