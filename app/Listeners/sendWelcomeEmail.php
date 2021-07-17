<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendWelcomeEmail
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        Mail::raw($event->user->name . ', Welcome to our blog. Greetings from the MH team', function($message) use ($event) {
            $message->from('admin@example.com', 'Mh Blog')->to($event->user->email)->subject('Thank you for registration.');
        });
    }
}
