<?php 

namespace App\Services;

use Http;

class UserService
{
   
    public function checkUserExists($userId): bool
    {
        $response = Http::get("http://localhost:8000/api/users/{$userId}");

        return $response->status() == 200;
    }
}