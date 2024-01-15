<?php

use App\Models\Task;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    return view('index',['tasks' => Task::latest()->get()]);
})->name('tasks.index');

//url and name of the view
Route::view('/tasks/create','create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id){

    return view('show',['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function(Request $request){
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    //create a new task
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show',['id' => $task->id])->with('success','task created');



})->name('tasks.store');

//response to wrong url
Route::fallback(function() {
    return "The page doesn't exist";
});
