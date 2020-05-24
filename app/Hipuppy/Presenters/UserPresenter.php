<?php

namespace App\Hipuppy\Presenters;


trait UserPresenter
{

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->surname;
    }

}
