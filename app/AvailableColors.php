<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvailableColors extends Model
{
    public $table = 'available_colors';
    public $timestamps = true;
    protected $fillable = ['breed_id', 'color_id', 'created_at', 'updated_at'];
}
