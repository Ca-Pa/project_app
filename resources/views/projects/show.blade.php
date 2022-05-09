@extends('layout')

@section('content')

<div class="row">
    <div class="col">
        <h1>Opened project</h1>
        <!-- mygtukas gristi i index -->
        <a href="{{ route('projects.index') }}" class="btn btn-primary" title="Back">Back to projects page</a>
    </div>
<div>
<br>
<div class="row">
    <div class="col">
        <h4>Project: {{ $project->project_name  }}</h4>
        <h5>Number of groups: {{ $project->groups }}</h5>
        <h5>Students per group: {{ $project->persons_in_group }}</h5>
    </div>
</div>
<br>
<h4> STUDENTS </h4>
<table class="table">
    <tr>
        <th>Student</th>
        <th>Group</th>
        <th>Action</th>
    </tr>

    @foreach($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td> 
                @if(isset($student->group))
                Group #{{$student->group}}
                @endif
            </td>
            <td>
                <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href="{{ route('students.edit', $student->id) }}?projectPage={{$project->id}}&groups={{$project->groups}}&limits={{$project->persons_in_group}}" class="btn btn-warning">Change group</a>
                </form>
            </td>
        </tr>
    @endforeach

</table>

<a href="{{ route('students.create')}}?projectPage={{$project->id}}&groups={{$project->groups}}&limits={{$project->persons_in_group}}" class="btn btn-primary" title="Add student">Add new student</a>
<br>
<br>
<h4> Groups </h4>
   @for ($i = 1; $i<=$project->groups; $i++)
        <table class="table">
            <tr>
                <th>Group #{{$i}}</th>
            </tr>
                @foreach($students as $student)
                    @if($student->group == $i)
                    <tr>
                        <td>
                            {{ $student->name }}
                        </td>
                    </tr>   
                    @endif  
                @endforeach
        </table>
    @endfor
    
@endsection