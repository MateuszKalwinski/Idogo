<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalDictionary extends Model
{
    public $table = 'animal_dictionary';

    public function animal_dictionary_species()
    {
        return $this->hasOne('App\AnimalDictionarySpecies', 'id');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function species()
    {
        return $this->belongsTo('App\AnimalSpecies');
    }
}
