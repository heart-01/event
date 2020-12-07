<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfilesRequest;

class ProfilesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = User::find(Auth::user()->id);
        return view('site.front.displayProfiles.index',
            [
                'data' => $data,
            ]
        );
    }

    public function updatePass(Request $request){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword], 
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ],
        [
            'current_password.required' => '* Password Old',
            'new_password.required' => '* New Password',
            'new_confirm_password.same' => '* Confirm Passwords do not match',
        ]);

        User::find(Auth::user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return back()->with('Success', 'Finished..');
    }

    public function updateProfiles(UpdateProfilesRequest $request){  

        $user = User::find(Auth::user()->id);
        $user->student_id = $request->stuId;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->school = $request->school;
        $user->FOS = $request->fos;
        $user->tel = $request->tel;
        $user->line_id = ($request->line_id) ? $request->line_id : null;
        $user->facebook_name = ($request->facebook_name) ? $request->facebook_name : null;
        $user->email = $request->email;
        $user->save();

        return back()->with('Success', 'Finished..');
    }

    
}
