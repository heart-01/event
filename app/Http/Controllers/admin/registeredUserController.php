<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class registeredUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
}
