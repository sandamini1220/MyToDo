@extends("layouts.default")

@section("title", "Welcome - ToDo App")

@section("content")
<main class="flex-shrink-0" style="padding-top: 70px;">
  <div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
      <h6 class="border-bottom pb-2 mb-0">My Tasks</h6>

      @if($tasks->isEmpty())
        <p class="text-muted">No tasks found.</p>
      @else
        @foreach($tasks as $task)
          <div class="d-flex text-body-secondary pt-3">
            @if($task->status === 'completed')
              
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-check me-2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M5 12l5 5l10 -10" />
              </svg>
            @else
              
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-narrow-right me-2">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l14 0" />
                <path d="M15 16l4 -4" />
                <path d="M15 8l4 4" />
              </svg>
            @endif

            <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
              <div class="d-flex justify-content-between align-items-center">
                <strong class="text-gray-dark">{{ $task->title }} | {{ $task->deadline }}</strong>

                @if($task->status !== 'completed')
                  <a href="{{ route('tasks.complete', $task->id) }}" class="btn btn-success btn-sm">Mark Completed</a>
                @else
                  <span class="badge bg-secondary">Completed</span>
                @endif
              </div>
              <span class="d-block">{{ $task->description }}</span>
            </div>
          </div>
        @endforeach

        {{-- Pagination links --}}
        <div class="mt-3">
          {{ $tasks->links() }}
        </div>

      @endif

      <small class="d-block text-end mt-3">
        <a href="{{ route('tasks.index') }}">View All Tasks</a>
      </small>
    </div>
  </div>
</main>
@endsection
