<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalBreedDescription extends Model
{
    public $table = 'animal_breed_descriptions';

    public function breed()
    {
        return $this->belongsTo('App\AnimalBreed', 'breed_id');
    }
}
