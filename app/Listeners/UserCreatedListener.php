<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Services\UserService;
use Cache;

class UserCreatedListener 
{
    private UserService $userService;

    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        Cache::forget('users:all');

        $this->userService->getAllUsers();
    }
}
