<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Events\ProjectPublished;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /**
         * Get all projects for currently authenticated user
         */
        return view('projects.index', ['projects' => auth()->user()->projects]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $this->authorize('create');
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:15']
        ]);
        $attributes['owner_id'] = auth()->id();
        Project::create($attributes);
        session()->flash('message', 'Your project has been published.');
        return redirect('/projects');
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);
        $project->update(request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:15']
        ]));
        return redirect('/projects')->with('success', 'Your project has been updated.');
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);
        $project->delete();
        return redirect('/projects')->with('success', 'Your project has been deleted.');
    }
}
