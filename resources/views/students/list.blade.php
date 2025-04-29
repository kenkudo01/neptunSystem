@extends("layouts.teacher_main")

@section("content")
<div class="container py-3">
  <h2>Take a New Subject</h2>


  <p>
    <a href="{{ url('students') }}" class="btn btn-secondary">Back to My Subjects</a>
  </p>

  <div class="row align-items-start">
    @foreach($projects as $project)
      <div class="col-6 col-sm-6 col-md-4 col-lg-3 my-3">
        <div class="card h-100">
          <img src="https://cdn.dribbble.com/users/12015/screenshots/2131050/apple_music.png" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{ $project->name }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <p class="card-text"><small class="text-muted">{{ $project->code }} : {{ $project->credit }} credit</small></p>
            <p class="card-text"><small class="text-muted">{{ $project->teacher->name ?? 'Unknown' }}</small></p>

            <form action="{{ route('students.take', ['project' => $project->id]) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success">Take</button>
            </form>

          </div>
        </div>
      </div>
    @endforeach
  </div>

</div>
@endsection
