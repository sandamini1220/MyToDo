@extends("layouts.default")

@section("title", "My Tasks")

@section("content")
<main class="flex-shrink-0" style="padding-top: 70px;">
    <div class="container">
        <h3 class="mb-4">My Tasks</h3>

        {{-- Live Search --}}
        <form id="searchForm" class="mb-4" autocomplete="off">
            <div class="input-group">
                <input type="text" id="searchInput" name="search" class="form-control" placeholder="Search by title...">
                <span class="input-group-text bg-primary text-white">
                    <i class="bi bi-search"></i>
                </span>
            </div>
        </form>

        <div class="my-3 p-3 bg-body rounded shadow-sm" id="taskListContainer">
            @include('task.partials.task_list', ['tasks' => $tasks])
        </div>
    </div>
</main>
@endsection

@push('styles')

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    function debounce(func, wait) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    $('#searchInput').on('keyup', debounce(function () {
        let searchQuery = $(this).val();

        $.ajax({
            url: '{{ route('tasks.index') }}',
            type: 'GET',
            data: { search: searchQuery },
            success: function (response) {
                $('#taskListContainer').html(response.html);
            }
        });
    }, 300));
</script>
@endpush
