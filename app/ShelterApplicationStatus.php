<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShelterApplicationStatus extends Model
{
    public $timestamps = false;
    protected $table = 'shelter_application_statuses';

    public function shelterApplication()
    {
        return $this->belongsTo('App\ShelterApplication', 'shelter_application_status_id');
    }
}
