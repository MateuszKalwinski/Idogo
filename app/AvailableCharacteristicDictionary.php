<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableCharacteristicDictionary extends Model
{
    public $table = 'available_characteristic_dictionary';
    public $timestamps = true;
    protected $fillable = ['species_id', 'characteristic_dictionary_id'];

    public function user()
    {
        return $this->belongsTo('App\AnimalSpecies', 'species_id');
    }
}
