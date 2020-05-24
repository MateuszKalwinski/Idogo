<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use Hipuppy\Presenters\UserPresenter;

    public static $roles = [];
    public $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'surname'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function phones()
    {
        return $this->hasMany('App\Phone', 'user_id');
    }

    public function owner()
    {
        return $this->morphMany('App\Animal', 'animalable');
    }

    public function addressable()
    {
        return $this->morphMany('App\Address', 'addressable');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id');
    }

    public function favourite_animals()
    {
        return $this->morphedByMany('App\Animal', 'favouriteable');
    }

    public function favourite_shelters()
    {
        return $this->morphedByMany('App\Shelter', 'favouriteable');
    }


    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }


    public function unotifications()
    {
        return $this->hasMany('App\Notification');
    }


    public function hasRole(array $roles)
    {

        foreach ($roles as $role) {

            if (isset(self::$roles[$role])) {
                if (self::$roles[$role]) return true;

            } else {
                self::$roles[$role] = $this->roles()->where('name', $role)->exists();
                if (self::$roles[$role]) return true;
            }

        }

        return false;

    }


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

}
