<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    public $table = 'regulations';
    public $timestamps = true;
    protected $fillable = ['version', 'content', 'active', 'created_at', 'updated_at'];

    public function acceptedRegulation()
    {
        $this->belongsTo('App\AcceptedRegulation', 'regulation_id');
    }

}
