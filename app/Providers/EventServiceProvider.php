<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ProfileWasUpdated' => [
            'App\Listeners\UpdateUserAddress',
            'App\Listeners\UpdateUserLocation',
            'App\Listeners\UpdateUserPhone',
        ],
        'App\Events\UserSignedUp' => [
            'App\Listeners\CreateUserProfile',
            'App\Listeners\CreateUserPhone',
            'App\Listeners\CreateUserAddress',
            'App\Listeners\CreateUserLocation',
            'App\Listeners\CreateUserRoles'
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
