<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Solution;

class StudentsController extends Controller
{
    public function index() {
        
        $user = auth()->user();
        $projects = $user->subjects;
        return view('students.my-page', compact('projects'));
    }

    public function details() {
        return view('students.details'); 
    }

    public function contact(){
        return view('students.contact');
    }

    public function list()
    {
        $user = auth()->user();
        $take = $user->projects()->pluck('projects.id');
        
        $projects = Project::whereNotIn('id', $take)->get();
        // $projects = Project::all();
        return view('students.list', compact('projects'));
    }



    public function take($projectId)
    {
        $user = auth()->user();
        $user->projects()->attach($projectId);
    
        $take = $user->projects()->pluck('projects.id');
        $projects = Project::whereNotIn('id', $take)->get();
        // $projects = Project::all();
        return view('students.list', compact('projects'));
    }


    public function leave($projectId)
    {
        $student = auth()->user(); 

      
        $student->projects()->detach($projectId);

        return redirect('/students')->with('success', 'Subject left successfully!');
    }
    public function subjectDetails($id)
    {
        $project = Project::findOrFail($id);
        return view('students.subject-details', compact('project'));
    }
    public function showTask($taskId)
    {
        $task = Task::findOrFail($taskId);

        return view('students.task-details', compact('task'));
    }

    public function submitSolution(Request $request, $taskId)
    {
        $validated = $request->validate([
            'content' => 'required|string|min:5',  // テキストエリア必須
        ]);

        Solution::create([
            'task_id' => $taskId,
            'user_id' => auth()->id(),
            'content' => $validated['content'],
            'submitted_at' => now(),
        ]);

        return redirect()->route('students.task-details', ['id' => $taskId])->with('success', 'Task submitted successfully!');
    }

    
    public function submitTask(Request $request, $id)
{
    $validated = $request->validate([
        'content' => 'required|string|min:5',
    ]);

    $task = \App\Models\Task::findOrFail($id);

    $solution = new \App\Models\Solution();
    $solution->task_id = $task->id;
    $solution->user_id = auth()->id();
    $solution->content = $validated['content'];
    $solution->save();


    return redirect()->route('students.subject-details', ['id' => $task->project->id]);
              
}




    public function taskDetails($id)
    {
        $task = Task::findOrFail($id);

        return view('students.task-details', compact('task'));
    }


    
}
