@extends("layouts.teacher_main")

@section("content")

<div class="container py-3">
    <h1 class="mb-4">Evaluate Solution</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ $task->name }}</h5>
            <p><strong>Task Description:</strong> {{ $task->description }}</p>
            <p><strong>Solution Content:</strong> {{ $solution->content ?? '(No content)' }}</p>
        </div>
    </div>

    <form action="{{ route('teachers.evaluate.store', ['solution' => $solution->id]) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="points" class="form-label">Points (0 ~ {{ $task->points }})</label>
            <input type="number" name="points" id="points" class="form-control @error('points') is-invalid @enderror" min="0" max="{{ $task->points }}" required>

            @error('points')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save Evaluation</button>
    </form>

    <a href="{{ route('tasks.details', ['id' => $task->id]) }}" class="btn btn-secondary mt-3">Back to Task</a>
</div>

@endsection
