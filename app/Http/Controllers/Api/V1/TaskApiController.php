<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use Http;
use Illuminate\Http\Request;
use App\Services\TaskService;
use App\Services\UserService;


class TaskApiController extends Controller
{   
    private TaskService $taskService;
    private UserService $userService;

    public function __construct(TaskService $taskService, UserService $userService)
    {
        $this->taskService = $taskService;
        $this->userService = $userService;
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
        // check if user exist using User-management-service
        $userExists = $this->userService->checkUserExists($request->user_id);

        if (!$userExists) {
            return response()->json(['message' => 'Task can not be created. User not found'], 404);
        }

        return response($this->taskService->addNewTask($request->validated()), 201);
    }

    public function update(int $id, StoreRequest $request)
    {
        $this->taskService->updateTask($id, $request->validated());
        return response()->json(['message' => 'task was succesefully updated'], 200);
    }

    public function destroy(int $id)
    {
        $this->taskService->deleteTask($id);
        return response()->json(['message' => 'task was succesefully deleted'], 200);
    }
}
