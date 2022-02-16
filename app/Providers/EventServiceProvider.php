<?php

namespace App\Providers;

use App\Listeners\Email\LogVerifiedUser;
use App\Listeners\Email\SendEmailVerificationNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        // Registered::class => [
        //     SendEmailVerificationNotification::class
        // ],
        'App\Events\Email\UserRegistered' => [
            'App\Listeners\Email\SendEmailVerificationNotification'
        ],
        Verified::class => [
            LogVerifiedUser::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
