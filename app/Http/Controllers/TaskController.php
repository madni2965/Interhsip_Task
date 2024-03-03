<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task);
    }

    public function updatePriority(Request $request, Task $task)
    {
        $task->update(['priority' => $request->priority]);
        return response()->json(['message' => 'Priority updated successfully']);
    }

    public function sortByPriority()
    {
        $tasks = Task::orderBy('priority', 'desc')->get();
        return response()->json($tasks);
    }
}
