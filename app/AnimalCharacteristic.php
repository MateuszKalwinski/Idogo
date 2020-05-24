<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalCharacteristic extends Model
{
    public $table = 'animal_characteristic';

    public function animal()
    {
        return $this->belongsTo('App\Animal', 'animal_id');
    }

    public function characteristicDictionary()
    {
        return $this->belongsTo('App\CharacteristicDictionary', 'characteristic_dictionary_id');
    }

}
