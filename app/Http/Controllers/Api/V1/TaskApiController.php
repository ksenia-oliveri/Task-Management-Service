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
    // Get all tasks by category
    public function show(Request $request)
    {
        return response()->json($this->taskService->getTasksByCategory($request->input('category')), 200);
    }

    public function index()
    {   
       return response()->json($this->taskService->getAllTasks(), 200);
    }

    // add a new task

    public function store(StoreRequest $request)
    {   
        $users = Http::get('http://localhost:8001/api/v1/users')->json();
        
        foreach($users as $user)
        {
            if($request->user_id == $user['id']){
                return response()->json($this->taskService->addNewTask($request->validated()), 201);
            } 
        }   

        foreach($users as $user)
        {
            if($request->user_id !== $user['id']){
                return response('user with user_id ' . $request->user_id . ' doesnt exist', 404);
            } 
        }   

    }
}
