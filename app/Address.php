<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    public $table = 'addresses';
    public $timestamps = false;
    protected $fillable = [
        'addressable_type',
        'addressable_id',
        'city_id',
        'street',
        'number',
        'lon',
        'lat',
        'created_at',
        'created_user_id',
        'edited_at',
        'edited_user_id',
        'deleted_at',
        'deleted_user_id'
    ];

    public function addressable()
    {
        return $this->morphTo();
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
