<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Створення нового завдання
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = Task::create($validated);

        return response()->json($task, 201);
    }

    // Отримання списку завдань
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    // Отримання інформації про одне завдання
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    // Оновлення інформації про завдання
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'status' => 'sometimes|in:open,closed',
        ]);

        $task->update($validated);

        return response()->json($task);
    }

    // Видалення завдання
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(null, 204);
    }
}
