@extends('layouts.app')

@section('content')
    <!-- Display tasks -->
    @foreach($tasks as $task)
        <div class="task">
            <h3>{{ $task->title }}</h3>
            <p>{{ $task->description }}</p>
            <span>Priority: {{ $task->priority }}</span>
            <span>Due Date: {{ $task->due_date }}</span>
            <form class="update-priority-form">
                <input type="hidden" name="task_id" value="{{ $task->id }}">
                <input type="number" name="priority" value="{{ $task->priority }}">
                <button type="submit">Update Priority</button>
            </form>
        </div>
    @endforeach

    <!-- Pagination links -->
    {{ $tasks->links() }}

    <!-- Task creation form -->
    <form id="create-task-form">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <textarea name="description" placeholder="Description"></textarea>
        <input type="number" name="priority" placeholder="Priority">
        <input type="date" name="due_date">
        <button type="submit">Create Task</button>
    </form>
@endsection

@section('scripts')
    <script>
        // AJAX Scripts here
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Submit task creation form via AJAX
    $('#create-task-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/tasks',
            data: $(this).serialize(),
            success: function(response) {
                // Handle success, e.g., update task list
            },
            error: function(error) {
                // Handle error
            }
        });
    });

    // Update task priority via AJAX
    $('.update-priority-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var task_id = $(this).find('input[name="task_id"]').val();
        $.ajax({
            type: 'POST',
            url: '/tasks/' + task_id + '/update-priority',
            data: formData,
            success: function(response) {
                // Handle success, e.g., update visual effects
            },
            error: function(error) {
                // Handle error
            }
        });
    });

    // Sort tasks by priority via AJAX
    $('#sort-by-priority-link').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'GET',
            url: '/tasks/sort-by-priority',
            success: function(response) {
                // Handle success, e.g., update task list
            },
            error: function(error) {
                // Handle error
            }
        });
    });
});
</script>

    </script>
@endsection
