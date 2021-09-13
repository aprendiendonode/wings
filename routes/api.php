<?php

use Illuminate\Support\Facades\Route;
use App\Task\Controllers\TaskController;
use App\Time\Controllers\TimeController;
use App\User\Controllers\UserController;
use App\Label\Controllers\LabelController;
use App\Project\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Labels
Route::get('labels', [LabelController::class, 'index'])->name('labels.index');
Route::get('labels/{label}', [LabelController::class, 'show'])->name('labels.show');
Route::post('labels', [LabelController::class, 'store'])->name('labels.store');
Route::put('labels/{label}', [LabelController::class, 'update'])->name('labels.update');
Route::delete('labels/{label}', [LabelController::class, 'delete'])->name('labels.delete');
Route::put('labels/{label}/restore', [LabelController::class, 'restore'])->name('labels.restore');
Route::delete('labels/{label}/force-delete', [LabelController::class, 'forceDelete'])->name('labels.forceDelete');

// Projects
Route::get('projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('projects', [ProjectController::class, 'store'])->name('projects.store');
Route::put('projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('projects/{project}', [ProjectController::class, 'delete'])->name('projects.delete');
Route::put('projects/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
Route::delete('projects/{project}/force-delete', [ProjectController::class, 'forceDelete'])->name('projects.forceDelete');

// Tasks
Route::get('/projects/{project}/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/projects/{project}/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('tasks/{task}', [TaskController::class, 'delete'])->name('tasks.delete');
Route::put('tasks/{task}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
Route::delete('tasks/{task}/force-delete', [TaskController::class, 'forceDelete'])->name('tasks.forceDelete');

// Times
Route::get('/projects/{project}/tasks/{task}/times', [TimeController::class, 'index'])->name('times.index');
Route::get('/projects/{project}/tasks/{task}/times/{time}', [TimeController::class, 'show'])->name('times.show');
Route::post('times', [TimeController::class, 'store'])->name('times.store');
Route::put('times/{time}', [TimeController::class, 'update'])->name('times.update');
Route::delete('times/{time}', [TimeController::class, 'delete'])->name('times.delete');
Route::put('times/{time}/restore', [TimeController::class, 'restore'])->name('times.restore');
Route::delete('times/{time}/force-delete', [TimeController::class, 'forceDelete'])->name('times.forceDelete');

// Users
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UserController::class, 'delete'])->name('users.delete');
Route::put('users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');
Route::delete('users/{user}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
