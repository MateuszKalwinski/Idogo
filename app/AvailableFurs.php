<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableFurs extends Model
{
    public $table = 'available_furs';
    public $timestamps = true;
    protected $fillable = ['breed_id', 'fur_id', 'created_at', 'updated_at'];
}
