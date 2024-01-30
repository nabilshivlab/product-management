@extends('layouts.dashboard')

@section('listcontent')
<div class="container">
    <h1>Create New Project</h1>
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Project</button>
        <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>

@endsection
