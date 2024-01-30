@extends('layouts.dashboard')

@section('listcontent')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<div class="container">
    <h1>{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>
    <p>Start Date: {{ $project->start_date }}</p>

    <h2>Tasks</h2>
    <div class="mb-3">
        <button class="btn btn-success" data-toggle="modal" data-target="#addTaskModal">Add Task</button>
    </div>

   @if(count($project->tasks) > 0)
        <ul class="list-group"  id="tasks-list">
            @foreach($project->tasks as $task)
                <li class="list-group-item">
                    <h4>{{ $task->title }}</h4>
                    <p>Status: {{ $task->status }}</p>
                    <p>Due Date: {{ $task->due_date }}</p>
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">View Details</a>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <input type="checkbox" class="taskCheckbox" data-id="{{ $task->id }}">                    
                </li>

                <!-- Task Deletion Modal -->
                <div class="modal fade" id="confirmDeleteModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{ $task->id }}" aria-hidden="true">
                    @include('tasks.confirm-delete', ['taskId' => $task->id])
                </div>
            @endforeach
        </ul>
    @else
        <p>No tasks found for this project.</p>
    @endif

    <a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back to Projects</a>
    @if(count($project->tasks) > 0)
        <button id="deleteSelected" class="btn btn-danger mt-3">Delete Selected</button>
    @endif
</div>

<!-- Add Task Modal include-->
<div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    @include('tasks.create', ['projectId' => $project->id])
</div>

<script>
        $(document).ready(function() {
            $('#deleteSelected').on('click', function() {
                var selectedTasks = $('.taskCheckbox:checked').map(function() {
                    return $(this).data('id');
                }).get();

                if (selectedTasks.length === 0) {
                    alert('Please select task to delete.');
                    return;
                }

                if (confirm('Are you sure you want to delete the selected task?')) {
                    var csrfToken = '{{ csrf_token() }}';
                    $.ajax({
                        url: '{{ route('tasks.deleteMultiple') }}',
                        type: 'DELETE',
                        data: { tasks: selectedTasks, _token: csrfToken },
                        success: function(response) {
                            alert(response.message);
                            selectedTasks.forEach(function(projectId) {
                                $('input.taskCheckbox[data-id="' + projectId + '"]').closest('li').remove();
                            });
                            if ($('#tasks-list li').length === 0) {
                                $('#deleteSelected').hide();
                            }
                        },
                        error: function(error) {
                            console.error('Error deleting projects:', error);
                        }
                    });
                }
            });
        });
    </script>
@endsection
