<?php 

namespace App\Services;
use Cache;
use Http;


class UserService
{
   
    public function checkUserExists($userId)
    {
        //$response = Http::get("http://localhost:8001/api/users/{$userId}");
        return Cache::get('users:' . $userId);

    }
}