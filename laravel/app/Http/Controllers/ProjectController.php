<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Category;
use App\Pledge;
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
        $categories = Category::all();
        return view('projects.create', compact('categories'));
    }

    public function store()
    {
        // $this->authorize('create');
        $projectAttributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:15'],
            'info' => ['required', 'min:100'],
            'deadline' => ['required'],
        ]);

        $category_id = Category::where('name', request('category'))->first()->id;

        $projectAttributes['owner_id'] = auth()->id();
        $projectAttributes['category_id'] = $category_id;
        $project = Project::create($projectAttributes);

        $pledgeAttributes = request()->validate([
            'goal' => ['required', 'numeric'],
        ]);
        $pledgeAttributes['project_id'] = $project->id;
        $pledge = Pledge::create($pledgeAttributes);
        return redirect('projects/' . $project->id)->with('message', 'Your project has been published.');
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        $categories = Category::all();
        return view('projects.edit', compact('project', 'categories'));
    }

    public function update(Project $project)
    {
        $this->authorize('update', $project);
        $project->update(request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:15'],
            'info' => ['required', 'min:100'],
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
