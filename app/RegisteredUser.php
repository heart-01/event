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
}
