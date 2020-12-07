<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\Captcha;
use Illuminate\Support\Facades\Validator;
use App\RegisteredUser;
use Auth;

class registeredUserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function ruleCaptcha(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => new Capcha(),
        ]);
        if ($validator->passes()) {
            return response()->json(['status' => '1']); // success
        }
        return response()->json(['status' => '0']); // not success
    }

    public function registered(Request $request)
    {
        if($request->ajax()){
            $RegisteredUser = new RegisteredUser();
            $RegisteredUser->user_id = Auth::user()->id;
            $RegisteredUser->event_id = $request->event_id;
            $RegisteredUser->registered_date = date('Y-m-d');
            $RegisteredUser->save();

            return 'success';
        }
    }
    
}
