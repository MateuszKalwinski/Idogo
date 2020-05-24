<?php


namespace App;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    public $table = 'roles';
    public $guarded = [];
    public $timestamps = false;


    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
