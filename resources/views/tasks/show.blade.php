@extends('layouts.dashboard')

@section('listcontent')


<div class="container">
    <h1>{{ $task->title }}</h1>
    <p>{{ $task->description }}</p>
    <p>Status: {{ $task->status }}</p>
    <p>Due Date: {{ $task->due_date }}</p>

    <a href="{{ route('projects.show', $task->project->id) }}" class="btn btn-secondary mt-3">Back to Project</a>
</div>

<!-- Task Deletion Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    @include('tasks.confirm-delete', ['taskId' => $task->id])
</div>
@endsection
