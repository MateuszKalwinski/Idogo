<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    public $table = 'addresses';

    public function addressable()
    {
        return $this->morphTo();
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
