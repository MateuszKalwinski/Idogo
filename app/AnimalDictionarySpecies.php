<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalDictionarySpecies extends Model
{
    public $table = 'animal_dictionary_species';

    public function animals()
    {
        return $this->belongsTo('App\Animal', 'id');
    }

    public function animal_dictionary()
    {
        return $this->belongsTo('App\AnimalDictionary', 'animal_dictionary_id');
    }
}
