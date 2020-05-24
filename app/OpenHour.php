<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpenHour extends Model
{
    public $table = 'open_hours';


    public function openhoursable()
    {
        return $this->morphTo();
    }

    public function day()
    {
        return $this->belongsTo('App\DayDictionary', 'day_id');
    }
}
