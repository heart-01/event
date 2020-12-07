<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\RegisteredUser;

class displayMyEventController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = RegisteredUser::MyEvent(Auth::user()->id)->get();
        $count = $data->count();

        return view('site.front.displayMyEvent.index', compact(['data', 'count']))->render();
    }
}
