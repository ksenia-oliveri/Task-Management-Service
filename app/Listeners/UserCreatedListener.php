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
       Cache::put('users:' . $user['id'],  $user);

    }
}
