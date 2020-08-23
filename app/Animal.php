<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Animal extends Model
{
    public $table = 'animals';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'name',
        'age',
        'description',
        'price',
        'animalable_type',
        'animalable_id',
        'species_id',
        'color_id',
        'fur_id',
        'size_id',
        'breed_id',
        'breed_mix',
        'animal_status_id',
        'recommended',
        'created_at',
        'created_user_id',
        'edited_at',
        'edited_user_id',
        'deleted_at',
        'deleted_user_id',
    ];


    public function animalable()
    {
        return $this->morphTo();
    }

    public function shelter()
    {
        return $this->belongsTo('App\Shelter', 'object_id');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }

    public function animalDictionarySpecies()
    {
        return $this->hasOne('App\AnimalDictionarySpecies', 'animal_id');
    }

    public function animalDictionary()
    {
        return $this->belongsToMany('App\AnimalDictionarySpecies', 'animal_dictionary', 'id', 'animal_dictionary_id');
    }

    public function animalSpecies()
    {
        return $this->belongsTo('App\AnimalSpecies', 'id');
    }

    public function animalColor()
    {
        return $this->belongsTo('App\AnimalColor', 'color_id');
    }

    public function animalSize()
    {
        return $this->belongsTo('App\AnimalSize', 'size_id');
    }

    public function animalBreed()
    {
        return $this->belongsTo('App\AnimalBreed', 'breed_id');
    }

    public function animalFur()
    {
        return $this->belongsTo('App\Fur', 'fur_id');
    }

    public function animalStatus()
    {
        return $this->belongsTo('App\AnimalStatus', 'animal_status_id');
    }

    public function addressable()
    {
        return $this->morphMany('App\Address', 'addressable');
    }

    public function isFavourite()
    {
        return $this->users()->where('user_id', Auth::user()->id)->exists();
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'favouriteable');
    }

    public function animalCharacteristic()
    {
        return $this->hasMany('App\AnimalCharacteristic', 'animal_id');
    }

}
