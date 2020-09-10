<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShelterApplication extends Model
{
    public $timestamps = false;
    protected $table = 'shelter_application';

    public function shelterApplicationStatus()
    {
        return $this->hasOne('App\ShelterApplicationStatus', 'shelter_application_status_id');
    }

    public function acceptedRegulation()
    {
        return $this->morphMany('App\AcceptedRegulation', 'acceptedregulationable');
    }
}
