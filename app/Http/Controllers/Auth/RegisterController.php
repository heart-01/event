<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'stuId' => ['required', 'numeric', 'min:6'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'school' => ['required'],
            'fos' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'numeric', 'min:11'],
            'lineId' => ['required', 'string', 'max:255'],
            'facebookName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // return $data;
        return User::create([
            'student_id' => $data['stuId'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'school' => $data['school'],
            'FOS' => $data['fos'],
            'tel' => $data['tel'],
            'status_user' => '3',
            'line_id' => $data['lineId'],
            'facebook_name' => $data['facebookName'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
