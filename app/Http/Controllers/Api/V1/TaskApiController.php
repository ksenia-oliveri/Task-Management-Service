<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use Http;
use Illuminate\Http\Request;
use App\Services\TaskService;


class TaskApiController extends Controller
{   
    private TaskService $taskService;

    public function __construct(TaskService $service)
    {
        $this->taskService = $service;
    }
    // Get all tasks 
    public function index()
    {   
       return response($this->taskService->getAllTasks(), 200);
    }
    // get all tasks that belongs to one category
    public function show(Request $request)
    {
        return response($this->taskService->getTasksByCategory($request->input('category')), 200);
    }

    // add a new task

    public function store(StoreRequest $request)
    {   
        

    }

    public function update(int $id, StoreRequest $request)
    {
        return response($this->taskService->updateTask($id, $request->validated()), 200);
    }

    public function destroy(int $id)
    {
        return response($this->taskService->deleteTask($id), 204);
    }
}
