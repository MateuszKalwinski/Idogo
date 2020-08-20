<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalColor extends Model
{

    public $table = 'animal_colors';
    public $timestamps = false;
    protected $fillable = ['name', 'class_name', 'created_at', 'created_user_id', 'edited_at', 'edited_user_id', 'deleted_at', 'deleted_user_id'];

    public function animal()
    {
        return $this->belongsTo('App\Animal', 'color_id');
    }
}
