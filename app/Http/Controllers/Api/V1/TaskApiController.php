<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskApiController extends Controller
{   
    private TaskService $taskService;

    public function __construct(TaskService $service)
    {
        $this->taskService = $service;
    }
    // Get all tasks by category
    public function index(Request $request)
    {
        return response($this->taskService->getTasksByCategory($request->input('category')), 200);
    }

    public function indexTasks()
    {
        return response($this->taskService->getAllTasks(), 200);
    }

    // add a new task

    public function store(StoreRequest $request)
    {
        return response($this->taskService->addNewTask($request->validated()), 201);
    }
}
