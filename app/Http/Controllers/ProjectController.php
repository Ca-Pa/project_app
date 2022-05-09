<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // list of projects at index page
    public function index(Request $request) : View
    {
        $projects = Project::latest()->paginate(5);

        return view('projects.index', compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // create new project
    public function create()
    {
        return view('projects.create');
    }

    // validate input and save data to database
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'project_name' => 'required',
            'groups' =>'required',
            'persons_in_group' =>'required',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully');
    }

    // show project and students list in the project
    public function show(Project $project, Request $request) : View
    {   
        $students = Student::where('project_id', $project->id)->get();

        return view('projects.show', compact('project', 'students'));
    }
}
