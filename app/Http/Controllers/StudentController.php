<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    // delete student and redirect to the project page
    public function destroy(Student $student) : RedirectResponse
    {
        $student->delete();
            // po delete sukuriam redirect i index page
            return redirect()->back()
            ->with('success', $student->name . ' removed successfully!');
    }

    // create new student
    public function create()
    {
        return view('students.create');
    }

    // validate input and save data to database
    public function store(Request $request) : RedirectResponse
    {  
        $limit = Student::groupBy('group')->select('group', DB::raw('count(*) as total'))
            ->where('group', $request->group)
            ->where('project_id', $request->project_id)
            ->get();

        Validator::make($request->all(), [
            'name' => ['required', 'unique:students',],
            'projectPage' => 'integer',
            'limits' => 'integer'
        ],[
            'name.unique' => 'This studet already exist in project http://localhost/projects/' . Student::where('name', $request->name)->value('project_id'),

        ])->validate();

        if (isset($limit[0]) && $limit[0]->total >= $request->limits){
            return redirect()->back()
                ->with('failure', 'Group #' . $request->group . ' is full');
        }

        Student::create($request->all());

        return redirect()->route('projects.show', $request->project_id)
            ->with('success', $request->name . ' added to project successfully');    
    }

    // change student Group
    public function edit(Student $student) : View
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id) : RedirectResponse
    {   
        $student = Student::find($id);

        $limit = Student::groupBy('group')->select('group', DB::raw('count(*) as total'))
            ->where('group', $request->group)
            ->where('project_id', $request->project_id)
            ->get();

        if (isset($limit[0]) && $limit[0]->total >= $request->limits){
            return redirect()->back()
                ->with('failure', 'Group #' . $request->group . ' is full');
        } 

        $student->group = $request->group;
        $student->update();

        if(!$student->group){
            return redirect()->route('projects.show', $request->project_id)
                ->with('success', $student->name . ' removed from groups successfully');
        };

        return redirect()->route('projects.show', $request->project_id)
            ->with('success', $student->name . ' group changed in to Group #' . $student->group . ' successfully');
    }

}
