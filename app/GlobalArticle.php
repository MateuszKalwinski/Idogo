<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalArticle extends Model
{

    public function photos()
    {
        return $this->morphMany('App\Photo', 'photoable');
    }
}
