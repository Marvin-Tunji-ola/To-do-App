<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Task;
class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');      
    }
    
    public function showAll()
    {
        $tasks = Task::where('user_id',auth()->id())->latest()->get();
        return view('home', compact('tasks'));
    }

    public function showCompleted()
    {
        $tasks = Task::where('user_id',auth()->id())->latest()->completed();
        return view('home', compact('tasks'));
    }

    public function showIncomplete()
    {
        $tasks = Task::where('user_id',auth()->id())->latest()->incomplete();
        return view('home', compact('tasks'));
    }

    public function create()
    {
        $this->validate(request(),[
            'task' => 'required|min:2'
        ]);     
        Task::create([
            'content' => request('task'),
            'user_id' => auth()->id()  
        ]);
        
        session()->flash('message', 'Task Sucessfully Added');
        return back();
    }

    public function edit($id)
    {
        $task = Task::findorfail($id);
        
        if($task->iscomplete)
            $task->iscomplete = false;
        else
            $task->iscomplete = true; 
        $task->save();
        return back();
    }

    public function delete($id)
    {
        Task::findorfail($id)->delete();
        return back();
    }
}
