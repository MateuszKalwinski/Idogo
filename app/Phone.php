<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{

    public $table = 'phones';
    public $timestamps = false;
    protected $fillable = ['user_id', 'phone', 'created_at', 'edited_at', 'edited_user_id', 'deleted_at', 'deleted_user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
