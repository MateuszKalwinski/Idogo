<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalSize extends Model
{
    public $table = 'animal_sizes';

    public function animal()
    {
        return $this->belongsTo('App\Animal', 'size');
    }
}
