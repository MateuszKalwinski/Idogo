<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalBreed extends Model
{

    public $table = 'animal_breeds';

    public function animal()
    {
        return $this->belongsTo('App\Animal', 'breed_id');
    }

    public function species()
    {
        return $this->belongsTo('App\AnimalSpecies', 'species_id');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function hasBreedDescription($breed_id)
    {
        return $this->breedDescription()->where('breed_id', $breed_id)->exists();
    }

    public function breedDescription()
    {
        return $this->hasOne('App\AnimalBreedDescription', 'breed_id');
    }
}
