<?php

use App\Http\Controllers\Api\V1\TaskApiController;
use Illuminate\Support\Facades\Route;

Route::get('v1/tasks/category', [TaskApiController::class, 'index']);
Route::get('/v1/tasks/all', [TaskApiController::class, 'indexTasks']);
Route::post('v1/add/task', [TaskApiController::class, 'store']);

