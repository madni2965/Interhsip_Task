<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::post('/tasks/{task}/update-priority', [TaskController::class, 'updatePriority']);
Route::get('/tasks/sort-by-priority', [TaskController::class, 'sortByPriority']);
