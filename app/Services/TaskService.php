<?php

namespace App\Services;
use App\Models\Task;

class TaskService
{
    //get all tasks by category
    public function getTasksByCategory($category)
    {
        return Task::join('categories', 'tasks.category_id', '=', 'categories.id')
        ->select('tasks.title', 'tasks.description', 'categories.name')
        ->where('categories.name', '=', $category)
        ->get();
    }

    //get all tasks

    public function getAllTasks()
    {
        return Task::all();
    }

    //add new task

    public function addNewTask($data)
    {
        return Task::create($data);
    }
}