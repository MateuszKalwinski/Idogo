<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    //protected $table = 'table_name';
    public $table = 'cities';
    public $timestamps = false;
    protected $guarded = [];

    public function rooms()
    {
        return $this->hasManyThrough('App\Room', 'App\TouristObject', 'city_id', 'object_id');
    }

    public function province()
    {
        return $this->belongsTo('App\Province', 'province_id');
    }

    public function animals()
    {
        return $this->hasManyThrough('App\Animal', 'App\Shelter', 'city_id', 'object_id');
    }

    public function address()
    {
        return $this->hasOne('App\Address', 'city_id');
    }


}
