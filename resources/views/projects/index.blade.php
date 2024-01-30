@extends('layouts.dashboard')

@section('listcontent')

<div class="container">
    <h1>Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>   

    @if(count($projects) > 0)
        <ul class="list-group" id="project-list">
            @foreach ($projects as $project)
                <li class="list-group-item">
                    <strong>{{ $project->name }}</strong>
                    <p>{{ $project->description }}</p>
                    <p>Start Date: {{ $project->start_date }}</p>
                    <p>Task Count: {{ $project->tasks_count }}</p>

                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">View Details</a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <input type="checkbox" class="projectCheckbox" data-id="{{ $project->id }}">
                </li>
            @endforeach
        </ul>
        <button id="deleteSelected" class="btn btn-danger mt-3">Delete Selected</button>
    @else
        <p>No projects found!.</p>
    @endif    

    

    <script>
        $(document).ready(function() {
            $('#deleteSelected').on('click', function() {
                var selectedProjects = $('.projectCheckbox:checked').map(function() {
                    return $(this).data('id');
                }).get();

                if (selectedProjects.length === 0) {
                    alert('Please select projects to delete.');
                    return;
                }

                if (confirm('Are you sure you want to delete the selected projects?')) {
                    var csrfToken = '{{ csrf_token() }}';
                    console.log(selectedProjects);
                    $.ajax({
                        url: '{{ route('projects.deleteMultiple') }}',
                        type: 'DELETE',
                        data: { projects: selectedProjects, _token: csrfToken },
                        success: function(response) {
                            alert(response.message);
                            selectedProjects.forEach(function(projectId) {
                                $('input.projectCheckbox[data-id="' + projectId + '"]').closest('li').remove();
                            });
                            if ($('#project-list li').length === 0) {
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
</div>    
@endsection

