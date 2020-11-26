<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    protected $table = 'eventcategory';

    protected $primaryKey = 'category_id';

    public $timestamps = false;

    protected $fillable = [
        'category_id', 'name',
    ];


}
