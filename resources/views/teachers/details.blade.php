
  @extends("layouts.teacher_main")


  @section("content")


        <div class="container">
          <h1 class="mb-4">Subject Details</h1>
      
          
          <div class="card mb-4">
          <div class="card-body">
            <h3 class="card-title">{{ $project->name }}</h3>
            <p class="card-text"><strong>Description:</strong> {{ $project->description }}</p>
            <p class="card-text"><strong>Subject Code:</strong> {{ $project->code }}</p>
            <p class="card-text"><strong>Credits:</strong> {{ $project->credit }}</p>
            <p class="card-text"><strong>Created At:</strong> {{ $project->created_at->format('Y-m-d') }}</p>
            <p class="card-text"><strong>Last Updated:</strong> {{ $project->updated_at->format('Y-m-d') }}</p>
            <p class="card-text"><strong>Assigned Students:</strong> {{ $project->students->count() }}</p>
          </div>
        </div>


        
        <h4 class="mb-3">Tasks</h4>
          <table class="table table-bordered">
            <thead class="table-light">
              <tr>
                <th>Task Name</th>
                <th>Points</th>
              </tr>
            </thead>
            <tbody>
              @foreach($project->tasks as $task)
                <tr>
                  <td><a href="{{ route('tasks.details', ['id' => $task->id]) }}">{{ $task->name }}</a></td>
                  <td>{{ $task->points }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>

          <p>
            <a href="{{ route('tasks.create', ['project' => $project->id]) }}" class="btn btn-secondary">Create a new Task</a>
          </p>

      
        
          <h4 class="mt-5">Enrolled Students</h4>
          <table class="table table-bordered table-striped">
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
      
          <a href="/teachers" class="btn btn-secondary mt-3">Back to My Subjects</a>
        </div>
    </div>
    
  @endsection