
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this task?</p>
            <form method="POST" action="{{ route('tasks.destroy', $taskId) }}" id="deleteTaskForm">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Task</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </form>
        </div>
    </div>
</div>

