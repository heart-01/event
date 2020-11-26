<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;

class CreateSessionLoggenIn
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
        if (Auth::check())
        {
            //echo $event->login.'listenner has been called';
            $user = User::find( Auth::user()->id);
            session::put('status',$user->status_user);
        }
    }
}
