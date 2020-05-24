<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public $table = 'genders';

    public function animal_dictionary()
    {
        return $this->hasOne('App\AnimalDictionary');
    }
}
