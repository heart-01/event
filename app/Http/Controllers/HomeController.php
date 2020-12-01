<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\UserLoggedIn;
use App\Event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        event(new  UserLoggedIn("Your login has success"));

        $data = Event::orderBy('event_id', 'desc')->get();

        return view('site.front.index', [
            'data' => $data,
        ]);
    }
}
