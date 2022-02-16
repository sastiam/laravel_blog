<?php

namespace App\Listeners\Email;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogVerifiedUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event->user;
        $this->whenUserHasVerified($user);
    }

    private function whenUserHasVerified($user)
    {
        /** @var App/Models/User $user */
        Log::info('User {$user->email} has verified', [
            'action' => 'user_verified_sucessful'
        ]);
    }
}
