<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Task;
class TaskController extends Controller
{
    public function showAll()
    {
        $tasks = Task::latest()->get();
        return view('home', compact('tasks'));
    }

    public function showCompleted()
    {
        $tasks = Task::latest()->completed();
        return view('home', compact('tasks'));
    }

    public function showIncomplete()
    {
        $tasks = Task::latest()->incomplete();
        return view('home', compact('tasks'));
    }

    public function create()
    {
        $this->validate(request(),[
            'task' => 'required|min:2'
        ]);
        Task::create([
            'content' => request('task'),
            'user_id' => 1 
        ]);

        return back();
    }

    public function delete($id)
    {
        Task::findorfail($id)->delete();
        return back();
    }
}
