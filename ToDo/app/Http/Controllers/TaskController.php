<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class TaskController extends Controller
{
    public function index()
    {
        

        return view('task.index');
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'deadline' => 'required|date',
            'description' => 'required|string',
        ]);

        
        Task::create([
            'title' => $request->title,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'user_id' => auth()->id(), 
        ]);

        
        return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
    }
}
