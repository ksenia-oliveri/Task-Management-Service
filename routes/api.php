<?php

use App\Http\Controllers\Api\V1\TaskApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::get('/tasks/category', [TaskApiController::class, 'show']);
    Route::get('/tasks/all', [TaskApiController::class, 'index']);
    Route::post('/add/task', [TaskApiController::class, 'store']);

});


