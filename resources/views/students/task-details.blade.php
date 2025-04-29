@extends("layouts.student_main")

@section("content")

<div class="container py-3">
    <h1 class="mb-4">Task Details</h1>


    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">{{ $task->name }}</h3>
            <p class="card-text"><strong>Subject:</strong> {{ $task->project->name }}</p>
            <p class="card-text"><strong>Teacher:</strong> {{ $task->project->teacher->name ?? 'Unknown' }} ({{ $task->project->teacher->email ?? 'No email' }})</p>
            <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
            <p class="card-text"><strong>Points:</strong> {{ $task->points }}</p>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-3">Submit your solution</h4>

            <form action="{{ route('students.task.submit', ['id' => $task->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">Your Solution</label>
                    <textarea
                        name="content"
                        id="content"
                        rows="5"
                        class="form-control @error('content') is-invalid @enderror"
                        placeholder="Write your solution here..."
                    >{{ old('content') }}</textarea>

                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <a href="{{ url('/students') }}" class="btn btn-secondary mt-3">Back to My Subjects</a>
</div>

@endsection
