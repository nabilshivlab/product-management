<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
   return view('layouts.home');
});

Route::resource('projects', ProjectController::class);
Route::delete('/projects/delete-multiple', [ProjectController::class, 'destroy'])->name('projects.deleteMultiple');


Route::resource('tasks', TaskController::class);
Route::delete('tasks/deleteMultiple', [TaskController::class, 'destroy'])->name('tasks.deleteMultiple');