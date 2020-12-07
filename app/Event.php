<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Event extends Model
{
    protected $table = 'event';

    protected $primaryKey = 'event_id';

    public $timestamps = false;

    // public $incrementing = false;

    protected $fillable = [
        'event_id', 'name', 'description', 'category_id', 'eventDateForm', 'eventDateTo', 'registerStartDate', 'registerEndDate', 'poster', 'banner', 'postedDate', 'postedBy', 'certificateAvailable', 'place', 'organizer',
    ];

    public function scopeEventAll($query)
    { 
        $status =  Auth::user()->status_user;

        $query = DB::table('event AS e')        
                ->where(function($query) use ($status) {
                    if ($status != 1) {
                        return $query->where('postedBy', '=', Auth::user()->id );
                    }
                })  
                ->select('*')
                ->orderBy("event_id", "desc");

        return $query;
    }

    public static function DateToText($data)
    {
        $data = explode(" ", $data);

        $strMonth = Array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");       

        $eventDateForm = explode("-", $data[0]);
        $dForm =  $eventDateForm[0];
        $mForm = $strMonth[$eventDateForm[1]];

        $eventDateTo = explode("-", $data[2]);;
        $dTo =  $eventDateTo[0];
        $mTo = $strMonth[$eventDateTo[1]];
        
        return "$dForm $mForm - $dTo $mTo";
    }
}