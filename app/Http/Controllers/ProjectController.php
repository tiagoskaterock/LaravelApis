<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest; 
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Auth;

class ProjectController extends Controller {
    
    function store(StoreProjectRequest $request) {
        $validated = $request->validated();
        $project = Auth::user()->projects()->create($validated);
        return new ProjectResource($project);

    }

    function update(UpdateProjectRequest $request, Project $project) {
        $validated = $request->validated();
        $project->update($validated);
        return new ProjectResource($project);
    }

}
