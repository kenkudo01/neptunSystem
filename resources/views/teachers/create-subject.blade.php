@extends("layouts.teacher_main")


@section("content")

<div class="container py-3">
  <h2>New Subject</h2>

  <form action="{{ route('teachers.store-subject') }}" method="POST">
    @csrf

    <!-- Subject name -->
    <div class="mb-3">
      <label class="form-label" for="name">Subject name</label>
      <input
        type="text"
        name="name"
        class="form-control @error('name') is-invalid @enderror"
        id="name"
        value="{{ old('name') }}"
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
      >{{ old('description') }}</textarea>
      @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!-- Subject code -->
    <div class="mb-3">
      <label class="form-label" for="code">Subject code</label>
      <input
        type="text"
        name="code"
        class="form-control @error('code') is-invalid @enderror"
        id="code"
        value="{{ old('code') }}"
      >
      @error('code')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <!-- Credit -->
    <div class="mb-3">
      <label class="form-label" for="credit">Credit number</label>
      <input
        type="text"
        name="credit"
        class="form-control @error('credit') is-invalid @enderror"
        id="credit"
        value="{{ old('credit') }}"
      >
      @error('credit')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <button type="submit" class="btn btn-primary">Add new subject</button>
    </div>
    
  </form>
</div>

@endsection
