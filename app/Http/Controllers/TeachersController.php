<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use App\Models\Solution;

class TeachersController extends Controller
{
    public function index() {

        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Unauthorized action.');
        }
        $projects = Project::where('user_id', auth()->id())->get();
        return view('teachers.list', compact('projects'));
  
    }

    public function create() {
        return view('teachers.create-subject'); 
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|string',
            'code' => 'required|regex:/^IK\-[A-Z]{3}[0-9]{3}$/',
            'credit' => 'required|integer|min:1',

        ]);

        $validated['user_id'] = auth()->id(); 
        Project::create($validated);
        return redirect("teachers");
       
    }

    public function createTask($project_id)
    {
    
        return view('teachers.create-task', compact('project_id'));
    }
    public function storeTask(Request $request, $project_id)
    {
        if (auth()->user()->role !== 'teacher') {
            abort(403, 'Unauthorized action.');
        }
    

        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'description' => 'required|string',
            'points' => 'required|integer|min:1',
        ]);
    
        Task::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'points' => $validated['points'],
            'project_id' => $project_id,
        ]);
    
        return redirect()->route('teachers.details', ['id' => $project_id])->with('success', 'Task created successfully!');
    }

    // public function details(){
    //     return view('teachers.details');
    // }

    public function details_task(){
        return view('teachers.task-details');
    }

    public function details($id) {
        $project = Project::findOrFail($id);
        // dd($project);
        return view('teachers.details', [
            "project" => $project,
        ]);
  
    }

    public function edit($id)
{
    if (auth()->user()->role !== 'teacher') {
        abort(403, 'Unauthorized action.');
    }

    $project = Project::findOrFail($id);

    return view('teachers.edit-subject', compact('project')); 
}


 
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|string',
            'code' => 'required|regex:/^IK\-[A-Z]{3}[0-9]{3}$/',
            'credit' => 'required|integer|min:1',
        ]);

        $project = Project::findOrFail($id);
        $validated['user_id'] = auth()->id(); 
        $project->update($validated);
        return redirect("teachers");
        
    }

  
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect("teachers");
        
    }


    public function showTask($id)
    {
        $task = Task::findOrFail($id);
        return view('teachers.task-details', compact('task'));
    }

    public function store_task(Request $request, $projectId)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|string',
            'points' => 'required|integer|min:1',
        ]);

        $task = new Task();
        $task->name = $validated['name'];
        $task->description = $validated['description'];
        $task->points = $validated['points'];
        $task->project_id = $projectId; // 親の教科に紐付ける
        $task->save();

        return redirect()->route('teachers.details', ['id' => $projectId]);
    }


    public function editTask($id)
    {
        $task = Task::findOrFail($id);
        return view('teachers.edit-task', compact('task'));
    }
    
    public function updateTask(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|string',
            'points' => 'required|integer|min:0',
        ]);

        $task = Task::findOrFail($id);
        $task->update($validated);

        return redirect()->route('tasks.details', ['id' => $task->id]);
    }
    public function evaluate($solutionId)
    {
        $solution = Solution::findOrFail($solutionId);
        $task = $solution->task;

        // dd($task);
        return view('teachers.evaluate', compact('solution', 'task'));
    }

    public function storeEvaluation(Request $request, Solution $solution)
    {
        $task = $solution->task;
    
        $validated = $request->validate([
            'points' => ['required', 'integer', 'min:0', 'max:' . $task->points],
        ]);
    
        $solution->points = $validated['points'];
        $solution->save();
    
        return redirect()->route('tasks.details', ['id' => $task->id]);
    }
}
