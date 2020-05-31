<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalSize extends Model
{
    public $table = 'animal_sizes';
    public $timestamps = false;
    protected $fillable = ['name', 'created_at', 'created_user_id', 'edited_at', 'edited_user_id', 'deleted_at', 'deleted_user_id'];

    public function animal()
    {
        return $this->belongsTo('App\Animal', 'size');
    }
}
