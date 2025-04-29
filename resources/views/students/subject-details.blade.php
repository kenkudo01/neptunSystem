@extends("layouts.student_main")
@section("content")

<div class="container py-3">
  <h1 class="mb-4">{{ $project->name }}</h1>

  <div class="card mb-4">
    <div class="card-body">
      <p><strong>Description:</strong> {{ $project->description }}</p>
      <p><strong>Code:</strong> {{ $project->code }}</p>
      <p><strong>Credits:</strong> {{ $project->credit }}</p>
      <p><strong>Created At:</strong> {{ $project->created_at->format('Y-m-d') }}</p>
      <p><strong>Last Updated:</strong> {{ $project->updated_at->format('Y-m-d') }}</p>
      <p><strong>Assigned Students:</strong> {{ $project->students->count() }}</p>
      <p><strong>Teacher:</strong> {{ $project->teacher->name }} ({{ $project->teacher->email }})</p>
    </div>
  </div>

  <h3 class="mt-5">Tasks</h3>
  <table class="table table-bordered">
    <thead class="table-light">
      <tr>
        <th>Task Name</th>
        <th>Points</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($project->tasks as $task)
        <tr>
          <td>
            <a href="{{ route('students.task.details', ['id' => $task->id]) }}">
              {{ $task->name }}
            </a>
          </td>
          <td>{{ $task->points }}</td>
          <td>
            @if($task->solutions->where('user_id', auth()->id())->isNotEmpty())
              <span class="badge bg-success">Submitted</span>
            @else
              <span class="badge bg-danger">Not Submitted</span>
            @endif
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <h3 class="mt-5">Students Enrolled</h3>
  <table class="table table-bordered">
    <thead class="table-light">
      <tr>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($project->students as $student)
        <tr>
          <td>{{ $student->name }}</td>
          <td>{{ $student->email }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <a href="{{ url('students') }}" class="btn btn-secondary mt-4">Back to My Subjects</a>
</div>

@endsection
