@extends('layout')

@section('content')
    <div class="row">
        <div class="col">
            <h1>CLASS PROJECTS</h1>
            <a href="{{ route('projects.create')}}" class="btn btn-primary" title="New Project">Create new project</a>
        </div>
    </div>

    <table class="table">
        <tr>
            <th>PROJECT NAME</th>
            <th wdth="200"></th>
        </tr>

        @foreach($projects as $project)
            <tr>
                <td>{{$project->project_name}}</td>
                <td><a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary" title="Open">OPEN</a></td>
            </tr>
        @endforeach
    </table>
    {{ $projects->links()}} 

@endsection