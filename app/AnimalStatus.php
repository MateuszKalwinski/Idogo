<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalStatus extends Model
{
    public $table = 'animal_status';

    public function animal()
    {
        return $this->belongsTo('App\Animal', 'animal_status_id');
    }
}
