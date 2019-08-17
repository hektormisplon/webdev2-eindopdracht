<?php

namespace App\Http\Controllers;

use App\Project;
use App\Category;
use Illuminate\Http\Request;

class DiscoveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $categories = Category::all();
        return view('discovery.index', compact('projects', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::where('id', $id)->first();
        return view('discovery.show', compact('project'));
    }
}
