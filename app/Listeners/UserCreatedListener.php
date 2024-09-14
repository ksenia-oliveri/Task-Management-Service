<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Cache;

class UserCreatedListener 
{
    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {   
        $user = $event->user;
        // Update the user cache with the new user data
       Cache::put('user:' . $user['id'], $user, 3600);    
    }
}
