<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredUser extends Model
{
    protected $table = 'registereduser';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id', 'user_id', 'event_id', 'registered_date', 'certificate_code', 'certificate_file', 'certificate_issue_date', 
    ];
}
