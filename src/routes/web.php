<?php

use App\Models\Task;
// use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', ['tasks' => \App\Models\Task::latest()->get()]);
})->name('tasks.index');

Route::view('/tasks/create', 'create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    // dd($request->all());
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created succesfully!');
})->name('tasks.store');

Route::put('/tasks/{task}/edit', function (Task $task, TaskRequest $request) {
    // dd($request->all());
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated succesfully!');
})->name('tasks.update');

