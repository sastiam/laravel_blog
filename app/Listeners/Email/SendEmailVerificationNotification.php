<?php

namespace App\Listeners\Email;

use App\Events\Email\UserRegistered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailVerificationNotification implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  \App\Events\Email\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        if ($event->user instanceof MustVerifyEmail && ! $event->user->hasVerifiedEmail()) {
            $event->user->sendEmailVerificationNotification();
        }
    }
}
