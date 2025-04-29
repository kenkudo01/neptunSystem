@extends("layouts.teacher_main")


@section("content")

<div class="container py-3">
  <h2>Edit Task</h2>

  <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Task name -->
    <div class="mb-3">
      <label class="form-label" for="name">Task Name</label>
      <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        id="name"
        value="{{ old('name', $task->name) }}"
      >
      @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!-- Description -->
    <div class="mb-3">
      <label class="form-label" for="description">Description</label>
      <textarea
        name="description"
        class="form-control @error('description') is-invalid @enderror"
        id="description"
        rows="3"
      >{{ old('description', $task->description) }}</textarea>
      @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!-- Points -->
    <div class="mb-3">
      <label class="form-label" for="points">Points</label>
      <input
        type="number"
        name="points"
        class="form-control @error('points') is-invalid @enderror"
        id="points"
        value="{{ old('points', $task->points) }}"
      >
      @error('points')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Update Task</button>
    </div>

  </form>
</div>

@endsection
