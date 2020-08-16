<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalSpecies extends Model
{
    public $table = 'animal_species';
    public $timestamps = false;
    protected $fillable = ['name', 'icon', 'created_at', 'created_user_id', 'edited_at', 'edited_user_id', 'deleted_at', 'deleted_user_id'];


    public function animal_dictionary()
    {
        return $this->hasOne('App\AnimalDictionary');
    }

    public function animal_breed()
    {
        return $this->hasMany('App\AnimalBreed', 'species_id');
    }

    public function available_characteristic_dictionary()
    {
        return $this->hasMany('App\AvailableCharacteristicDictionary', 'species_id');
    }

}
