@extends('layout')

@section('content')
<div class="row">
    <div class="col">
    <h1>Create a new project</h1>
    <a href="{{ route('projects.index') }}" class="btn btn-primary" title="Back">Back to projects page</a>

    </div>
<div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project name:</strong>
                <input type="text" name="project_name" class="form-control" placeholder="Enter project name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>How many groups in the project:</strong>
                <input type="number" name="groups" class="form-control" placeholder="Enter number of groups">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>How many students per group:</strong>
                <input type="number" name="persons_in_group" class="form-control" placeholder="Enter number of students">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save project</button>
        </div>
    </div>
</form>

@endsection