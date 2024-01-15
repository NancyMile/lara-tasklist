<?php

use App\Models\Task;
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

Route::get('/tasks/{id}', function ($id){

    return view('show',['task' => Task::findOrFail($id)]);
})->name('tasks.show');


//response to wrong url
Route::fallback(function() {
    return "The page doesn't exist";
});
