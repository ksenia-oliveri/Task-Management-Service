<?php

namespace App\Services;
use App\Models\Task;

class TaskService
{
    //get all tasks by category
    public function getTasksByCategory(string $category)
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

    public function addNewTask(array $task)
    {
        return Task::create($task);
    }

    //update the task 

    public function updateTask(int $id, array $task)
    {
        return Task::find($id)->update($task);
    }

    //delete the task
    public function deleteTask(int $id)
    {
        return Task::destroy($id);
    }
}