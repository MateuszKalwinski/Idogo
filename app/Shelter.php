<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shelter extends Model
{
    public $timestamps = false;
    protected $table = 'shelters';

    public function owner()
    {
        return $this->morphMany('App\Animal', 'animalable');
    }

    public function addressable()
    {
        return $this->morphMany('App\Address', 'addressable');
    }

    public function isFavourite()
    {
        return $this->users()->where('user_id', Auth::user()->id)->exists();
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'favouriteable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }



//    public function address()
//    {
//        return $this->hasOne('App\Address','object_id');
//    }


//    public function animals()
//    {
//        return $this->hasMany('App\Animal','object_id');
//    }

    public function openHoursable()
    {
        return $this->morphMany('App\OpenHour', 'openhoursable');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }


    public function articles()
    {
        return $this->hasMany('App\Article', 'object_id');
    }

}
