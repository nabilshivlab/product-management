@extends('layouts.dashboard')

@section('listcontent')
<div class="container">
    <h1>Edit Project</h1>
    <form method="POST" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Project Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $project->start_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Project</button>
        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
@endsection
