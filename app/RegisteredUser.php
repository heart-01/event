<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegisteredUser extends Model
{
    protected $table = 'registereduser';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id', 'user_id', 'event_id', 'registered_date', 'certificate_code', 'certificate_file', 'certificate_issue_date', 
    ];

    public function scopeCheckRegister($query,$user_id,$event_id)
    {
        $user_id = $user_id;
        $event_id = $event_id;

        $query = DB::table('registereduser AS r')
        ->where('r.user_id', $user_id)
        ->where('r.event_id', $event_id)
        ->select('*');

        return $query;
    }

    public function scopeReportRegisteredUser($query,$event_id)
    {
        $event_id = $event_id;

        $query = DB::table('registereduser AS r')
        ->join('event AS e', 'e.event_id', '=', 'r.event_id')
        ->join('users AS u', 'u.id', '=', 'r.user_id')
        ->where('r.event_id', '=', $event_id)
        ->orderBy('u.lname', 'asc')
        ->select('*');

        return $query;
    }

    public function scopeMyEvent($query,$user_id)
    {
        $user_id = $user_id;

        $query = DB::table('registereduser AS r')
        ->join('event AS e', 'e.event_id', '=', 'r.event_id')
        ->join('users AS u', 'u.id', '=', 'r.user_id')
        ->where('r.user_id', '=', $user_id)
        ->orderBy('r.registered_date', 'desc')
        ->select('*');

        return $query;
    }

}
