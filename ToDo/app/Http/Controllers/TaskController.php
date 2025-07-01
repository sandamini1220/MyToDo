<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Tasks::where('user_id', auth()->id())
                      ->where('status', '!=', 'completed')
                      ->orderBy('deadline')
                      ->paginate(3);

        return view('task.index', compact('tasks'));
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

        $task = Tasks::create([
            'title' => $request->title,
            'deadline' => $request->deadline,
            'description' => $request->description,
            'user_id' => auth()->id(),
            'status' => 'pending',
        ]);

        return $task
            ? redirect()->route('tasks.index')->with('success', 'Task added successfully!')
            : redirect()->route('tasks.create')->with('error', 'Task not added');
    }

    public function updateTaskStatus($id)
    {
        $task = Tasks::where('id', $id)
                     ->where('user_id', auth()->id())
                     ->first();

        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }

        $task->status = 'completed';
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task marked as completed!');
    }

    public function listTask()
    {
        $tasks = Tasks::orderBy('created_at', 'desc')->paginate(5);
        return view('welcome', compact('tasks'));
    }

    public function completedTasks()
    {
        $tasks = Tasks::where('user_id', auth()->id())
                      ->where('status', 'completed')
                      ->orderBy('deadline')
                      ->paginate(3);

        return view('task.completed', compact('tasks'));
    }

    public function destroy($id)
    {
        $task = Tasks::where('id', $id)
                     ->where('user_id', auth()->id())
                     ->first();

        if (!$task) {
            return redirect()->route('tasks.index')->with('error', 'Task not found');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
