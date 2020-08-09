<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnimalBreed extends Model
{

    public $table = 'animal_breeds';
    public $timestamps = false;
    protected $fillable = ['species_id', 'name', 'created_at', 'created_user_id', 'edited_at', 'edited_user_id', 'deleted_at', 'deleted_user_id'];

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
