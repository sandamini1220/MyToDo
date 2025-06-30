@extends("layouts.default")

@section("content")
<div class="card shadow-sm p-3" style="max-width: 500px; margin: auto;">
    <h2 class="mb-4">Add New Task</h2>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="mb-3">
            <label for="taskTitle" class="form-label">Task Title</label>
            <input type="text" class="form-control" id="taskTitle" name="title" placeholder="Enter task title" required>
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="datetime-local" class="form-control" id="deadline" name="deadline" required>
        </div>

        <div class="mb-3">
            <label for="taskDescription" class="form-label">Task Description</label>
            <textarea class="form-control" id="taskDescription" name="description" rows="4" placeholder="Describe the task" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>
</div>
@endsection
