<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Http\Request;;
use App\Models\Task;

class TaskController extends Controller {

    function index() {
        return new TaskCollection(Task::all());
    }

    function show(Request $request, Task $task) {
        return new TaskResource($task);
    }

    function store(StoreTaskRequest $request) {        
        $validated = $request->validated();
        $task = Task::create($validated);
        return new TaskResource($task);
    }

    function update(UpdateTaskRequest $request, Task $task) {
        $validated = $request->validated();
        $task->update($validated);
        return new TaskResource($task);
    }

    function destroy(Request $request, Task $task) {
        $task->delete();
        return response()->noContent();
    }

}
