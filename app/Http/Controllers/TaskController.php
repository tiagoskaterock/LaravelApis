<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;;
use App\Models\Task;

class TaskController extends Controller
{

    function index() {
        return new TaskCollection(Task::all());
        // return response()->json(Task::all());
    }


    function show(Request $request, Task $task) {
        return new TaskResource($task);
    }


    function store(StoreTaskRequest $request) {        
        $validated = $request->validated();
        $task = Task::create($validated);
        return new TaskResource($task);
    }

}
