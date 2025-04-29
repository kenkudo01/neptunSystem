@extends("layouts.teacher_main")


@section("content")

<div class="container py-3">
  <h2>New Task</h2>

  <form action="{{ route('tasks.store', ['project' => $project_id]) }}" method="POST">

    @csrf

    <!-- Task name -->
    <div class="mb-3">
      <label class="form-label" for="task_name">Task name</label>
      <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        id="task_name"
        value="{{ old('name') }}"
      >
      @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <!-- Description -->
    <div class="mb-3">
      <label class="form-label" for="task_description">Description</label>
      <textarea
        name="description"
        class="form-control @error('description') is-invalid @enderror"
        id="task_description"
        rows="3"
      >{{ old('description') }}</textarea>
      @error('description')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <!-- Point -->
    <div class="mb-3">
      <label class="form-label" for="task_point">Point</label>
      <input
        type="text"
        name="points"
        class="form-control @error('points') is-invalid @enderror"
        id="task_point"
        value="{{ old('points') }}"
      >
      @error('points')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>

    <!-- Submit -->
    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Add new task</button>
    </div>

  </form>
</div>

@endsection
