<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'id', 'student_id', 'fname', 'lname', 'school', 'FOS', 'tel', 'status_user', 'line_id', 'facebook_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    public function getStatusAttribute(){ 
        $users = User::find(Auth::user()->id);
        return $users->status_user;
    }

    public function scopeUsersAll($query)
    { 
        $query = DB::table('users AS u')
                ->select('*')
                ->orderBy("id", "desc");

        return $query;
    }
}