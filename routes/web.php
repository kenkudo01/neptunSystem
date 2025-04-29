<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('/contact', function () {
    return view('contact');
});



Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/students', [StudentsController::class, "index"]);
    Route::get('/students/details', [StudentsController::class, "details"]);
    Route::get('/students/contact', [StudentsController::class, "contact"]);
    Route::get('/students/list', [StudentsController::class, 'list'])->name('students.list');
    Route::post('/students/take/{project}', [StudentsController::class, 'take'])->name('students.take');

    Route::delete('/students/leave/{project_id}', [StudentsController::class, 'leave'])->name('students.leave');
    Route::get('/students/subject/{id}', [StudentsController::class, 'subjectDetails'])->name('students.subject-details');
    Route::get('/students/task/{id}', [StudentsController::class, 'showTask'])->name('students.task-details');
    Route::post('/students/task/{id}/submit', [StudentsController::class, 'submitTask'])->name('students.task.submit');

    Route::get('/students/tasks/{id}', [StudentsController::class, 'taskDetails'])->name('students.task.details');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/teachers', [TeachersController::class, 'index'])->name('teachers.index');
    Route::get('/teachers/create-subject', [TeachersController::class, 'create'])->name('teachers.create-subject');
    Route::post('/teachers/create-subject', [TeachersController::class, 'store'])->name('teachers.store-subject');
    Route::get('/teachers/create-task', [TeachersController::class, "create_task"]);
    Route::get('/teachers/details', [TeachersController::class, "details"]);
    Route::get('/teachers/task-details', [TeachersController::class, "details_task"]);
    Route::get('/teachers/{id}', [TeachersController::class, 'details'])->name('teachers.details');
    Route::delete('/teachers/{id}', [TeachersController::class, 'destroy'])->name('teachers.destroy');

    Route::get('/teachers/{id}/edit', [TeachersController::class, 'edit'])->name('teachers.edit');
    Route::put('/teachers/{id}', [TeachersController::class, 'update'])->name('teachers.update');

    Route::get('/teachers/{project}/tasks/create', [TeachersController::class, 'createTask'])->name('tasks.create');
    Route::post('/teachers/{project}/tasks', [TeachersController::class, 'store_task'])->name('tasks.store');

    Route::get('/tasks/{id}', [TeachersController::class, 'showTask'])->name('tasks.details');
    Route::get('/tasks/{id}/edit', [TeachersController::class, 'editTask'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TeachersController::class, 'updateTask'])->name('tasks.update');


    Route::get('/teachers/{solution}/evaluate', [TeachersController::class, 'evaluate'])->name('teachers.evaluate');
    Route::post('/teachers/{solution}/evaluate', [TeachersController::class, 'storeEvaluation'])->name('teachers.evaluate.store');


});
