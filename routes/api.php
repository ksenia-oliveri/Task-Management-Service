<?php

use App\Http\Controllers\Api\V1\TaskApiController;
use Illuminate\Support\Facades\Route;

Route::apiResource('tasks', TaskApiController::class);

