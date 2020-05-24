<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fur extends Model
{
    public $table = 'fur';

    public function animal()
    {
        return $this->belongsTo('App\Animal', 'fur_id');
    }
}
