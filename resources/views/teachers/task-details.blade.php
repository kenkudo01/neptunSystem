@extends("layouts.teacher_main")

@section("content")

<div class="container">
    <h1 class="mb-4">Task Details</h1>

    <div class="card mb-4">
      <div class="card-body">
        <h3 class="card-title">{{ $task->name }}</h3>
        <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
        <p class="card-text"><strong>Points:</strong> {{ $task->points }}</p>
        <p class="card-text"><strong>Submitted Solutions:</strong> {{ $task->solutions->count() }}</p>
        <p class="card-text"><strong>Evaluated Solutions:</strong> {{ $task->solutions->whereNotNull('points')->count() }}</p>
      </div>
    </div>

    <h3 class="mt-5">Submitted Solutions</h3>

    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>Student Name</th>
          <th>Student Email</th>
          <th>Submitted At</th>
          <th>Points</th>
          <th>Evaluated At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($task->solutions as $solution)
          <tr>
            <td>{{ $solution->student->name }}</td>
            <td>{{ $solution->student->email }}</td>
            <td>{{ $solution->created_at->format('Y-m-d H:i') }}</td>
            <td>{{ $solution->points ?? '-' }}</td>
            <td>{{ $solution->updated_at && $solution->points !== null ? $solution->updated_at->format('Y-m-d H:i') : '-' }}</td>
            <td>
              @if($solution->points === null)
                <a href="{{ route('teachers.evaluate', ['solution' => $solution->id]) }}" class="btn btn-sm btn-primary">Evaluate</a>
              @else
                Evaluated
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="d-flex gap-2 mt-4">
      <a href="{{ route('teachers.details', ['id' => $task->project_id]) }}" class="btn btn-secondary">Back to Subject</a>
      <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="btn btn-primary">Edit Task</a>
    </div>
</div>

@endsection
