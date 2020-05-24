<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fur extends Model
{
    public $table = 'fur';
    public $timestamps = false;
    protected $fillable = ['name', 'created_at', 'created_user_id', 'edited_at', 'edited_user_id', 'deleted_at', 'deleted_user_id'];

    public function animal()
    {
        return $this->belongsTo('App\Animal', 'fur_id');
    }
}
