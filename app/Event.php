<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    protected $table = 'event';

    protected $primaryKey = 'event_id';

    public $timestamps = false;

    // public $incrementing = false;

    protected $fillable = [
        'event_id', 'name', 'description', 'category_id', 'eventDateForm', 'eventDateTo', 'registerStartDate', 'registerEndDate', 'poster', 'banner', 'postedDate', 'postedBy', 'certificateAvailable', 'organizer',
    ];

    public function scopeEventAll($query)
    {
        $query = DB::table('event AS e')
        ->select('*')
        ->orderBy("event_id", "desc");

        return $query;
    }
}
