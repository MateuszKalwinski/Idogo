<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShelterApplicationActivationCode extends Model
{
    protected $table = 'shelter_application_activation_codes';
    public $timestamps = true;
    protected $fillable = ['shelter_application_id', 'code', 'created_at', 'updated_at'];

    public function shelterApplication(){
        return $this->hasOne('App\ShelterApplication', 'shelter_application_id');
    }

}
