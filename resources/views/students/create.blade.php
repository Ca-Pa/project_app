@extends('layout')

@section('content')
<div class="row">
    <div class="col">
        <h1>Add new student to the project</h1>
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

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter student name and surname">
                <input type="hidden" name="project_id" value="{{ $_GET['projectPage'] }}">
                <input type="hidden" name="limits" value="{{ $_GET['limits'] }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Project Group:</strong>
                <select name="group" id="cars">
                    <option value=""> None </option>
                    @for ($i = 1; $i<=($_GET['groups']); $i++)
                        <option value="{{ $i }}">Group #{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Add student</button>
            <a href="{{ route('projects.show', $_GET['projectPage']) }}" class="btn btn-warning" title="Cancel">Cancel</a>
        </div>
    </div>
</form>

@endsection