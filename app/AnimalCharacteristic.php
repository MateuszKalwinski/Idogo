<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalCharacteristic extends Model
{
    public $table = 'animal_characteristic';
    public $timestamps = true;
    protected $fillable = [
        'animal_id',
        'characteristic_dictionary_id',
        'character_status',
        'created_at',
        'updated_at'
    ];

    public function animal()
    {
        return $this->belongsTo('App\Animal', 'animal_id');
    }

    public function characteristicDictionary()
    {
        return $this->belongsTo('App\CharacteristicDictionary', 'characteristic_dictionary_id');
    }

}
