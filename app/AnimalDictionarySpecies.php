<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalDictionarySpecies extends Model
{
    public $table = 'animal_dictionary_species';
    public $timestamps = false;
    protected $fillable = [
        'animal_id',
        'animal_dictionary_id',
        'created_at',
        'created_user_id',
        'edited_at',
        'edited_user_id',
        'deleted_at',
        'deleted_user_id'
    ];

    public function animals()
    {
        return $this->belongsTo('App\Animal', 'id');
    }

    public function animal_dictionary()
    {
        return $this->belongsTo('App\AnimalDictionary', 'animal_dictionary_id');
    }
}
