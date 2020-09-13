<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptedRegulation extends Model
{
    public $table = 'accepted_regulations';
    public $timestamps = true;
    protected $fillable = ['acceptedregulationable_id', 'acceptedregulationable_id', 'regulation_id', 'created_at', 'updated_at'];

    public function acceptedregulationable()
    {
        return $this->morphTo();
    }

    public function regulation()
    {
        return $this->hasOne('App\Regulation', 'regulation_id');
    }
}


