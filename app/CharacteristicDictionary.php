<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacteristicDictionary extends Model
{
    public $table = 'characteristic_dictionary';
    public $timestamps = false;
    protected $fillable = ['name', 'created_at', 'created_user_id', 'edited_at', 'edited_user_id', 'deleted_at', 'deleted_user_id'];


    public function animalCharacteristic()
    {
        return $this->belongsTo('App\AnimalCharacteristic', 'characteristic_dictionary_id');
    }

}
