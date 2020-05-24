<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $table = 'provinces';

    public function city()
    {
        return $this->belongsTo('App\City', 'province_id');
    }
}
