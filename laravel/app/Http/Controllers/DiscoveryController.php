<?php

namespace App\Http\Controllers;

use PDF;
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
        $category = request('category');

        if ($category) {
            $projects = Project::where('category_id', Category::where('name', $category)->first()->id)->get();
            return view('discovery.index', compact('projects', 'categories'));
        }

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
        $project = Project::findOrFail($id);
        return view('discovery.show', compact('project'));
    }

    public function getPDF($id)
    {
        $project = Project::findOrFail($id);
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('pdf.index', $project);
        return $pdf->download('project.pdf');
    }
}
