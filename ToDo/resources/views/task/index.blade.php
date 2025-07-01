@extends("layouts.default")

@section("title", "My Tasks")

@section("content")
<main class="flex-shrink-0" style="padding-top: 70px;">
    <div class="container">
        <h3 class="mb-4">My Tasks</h3>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            @if($tasks->isEmpty())
                <p class="text-muted">No tasks found.</p>
            @else
                @foreach($tasks as $task)
                    <div class="d-flex text-body-secondary pt-3">
                        @if($task->status === 'completed')
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="icon icon-tabler icon-tabler-check me-2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l5 5l10 -10" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="icon icon-tabler icon-tabler-arrow-narrow-right me-2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M5 12l14 0" />
                                <path d="M15 16l4 -4" />
                                <path d="M15 8l4 4" />
                            </svg>
                        @endif

                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong class="text-gray-dark">{{ $task->title }} | {{ $task->deadline }}</strong>

                                <div class="d-flex align-items-center">
                                    @if($task->status !== 'completed')
                                        <a href="{{ route('tasks.complete', $task->id) }}"
                                           class="btn btn-success btn-sm me-2" title="Mark Completed">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="icon icon-tabler icon-tabler-check">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>
                                        </a>
                                    @else
                                        <span class="badge bg-success me-2" title="Completed">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="icon icon-tabler icon-tabler-check">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>
                                        </span>
                                    @endif

                                    <form action="{{ route('tasks.destroy', $task->id) }}"
                                          method="POST" style="display:inline-block;"
                                          onsubmit="return confirm('Are you sure you want to delete this task?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm p-1" title="Delete Task" style="line-height: 0;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                 class="icon icon-tabler icon-tabler-trash">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <span class="d-block">{{ $task->description }}</span>
                        </div>
                    </div>
                @endforeach

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $tasks->links() }}
                </div>
            @endif

            <small class="d-block text-end mt-3">
                <a href="{{ route('home') }}">View All Tasks</a>
            </small>
        </div>
    </div>
</main>
@endsection
