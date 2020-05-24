<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayDictionary extends Model
{
    public $table = 'days_dictionary';

    public function openHour()
    {
        return $this->belongsTo('App\OpenHour', 'day_id');
    }
}
