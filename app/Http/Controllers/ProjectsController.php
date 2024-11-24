<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\ProjectModel;

class ProjectsController extends Controller
{

    public function index () {
        $projects = ProjectModel::all();
        return view('index', compact('projects'));
    }
    public function getProjects() {
        $projects = ProjectModel::all();
        return response()->json($projects);
    }
    public function store(ProjectRequest $request) {
        $project = ProjectModel::create([
            'name' => $request->validated()['projectName'],
            'price' => $request->validated()['projectPrice'],
            'description' => $request->validated()['projectDescription'],
        ]);

        if ($request->hasFile('projectImage')) {
            $path = $request->file('projectImage')->store('images/projects', 'public');

            $project->image_path = $path;
            $project->save();
        }

        return response()->json(['message' => 'Project registered successfully']);
    }


    public function delete($id)
    {
        $project = ProjectModel::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Projeto deletado com sucesso!']);
    }
}
