<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:tasks'],
        ]);

        Task::create($data);

        return redirect('');
    }

    public function show(int $id)
    {
        $task = Task::where('id', $id)->firstOrFail();

        return view('show', ['task' => $task]);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100', 'unique:tasks'],
        ]);

        $task = Task::where('id', $id)->firstOrFail();
        $task->update($data);

        return redirect($id);
    }

    public function destroy(int $id)
    {
        $task = Task::where('id', $id)->firstOrFail();
        $task->delete();

        session()->flash('deletedTask', $task);

        return redirect('');
    }
}
