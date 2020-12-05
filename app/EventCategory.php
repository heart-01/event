<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EventCategory extends Model
{
    protected $table = 'eventcategory';

    protected $primaryKey = 'category_id';

    public $timestamps = false;

    protected $fillable = [
        'category_id', 'name',
    ];

    public function scopeCategoryAll($query)
    { 
        $query = DB::table('eventcategory AS c')
                ->select('*')
                ->orderBy("category_id", "desc");

        return $query;
    }


}
