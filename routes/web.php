<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/tasks', function (){
    return view('index',['tasks' => Task::latest()->paginate()]);
})->name('tasks.index');

//url and name of the view
Route::view('/tasks/create','create')->name('tasks.create');


Route::get('/tasks/{task}/edit', function (Task $task){
    return view('edit',['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task){
    return view('show',['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function(TaskRequest $request){
    $task =  Task::create($request->validated());
    return redirect()->route('tasks.show',['task' => $task->id])->with('success','task created');
})->name('tasks.store');

Route::put('/tasks/{task}', function(Task $task, TaskRequest $request){
    //update
    $task->update($request->validated());
    return redirect()->route('tasks.show',['task' => $task->id])->with('success','task update');
})->name('tasks.update');

//response to wrong url
Route::fallback(function() {
    return "The page doesn't exist";
});

Route::delete('/tasks/{task}',function(Task $task){
    $task->delete();
    return  redirect()->route('tasks.index')->with('success','task deleted');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-completed',function(Task $task){
    $task->toggleComplete();
    return redirect()->back()->with('success','task updated');
})->name('tasks.toggle-completed');
