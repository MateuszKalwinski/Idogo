<?php

namespace App\Hipuppy\Gateways;

use App\Hipuppy\Interfaces\AnimalsRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;


class AnimalsGateway
{
    use ValidatesRequests;


    public function __construct(AnimalsRepositoryInterface $aR)
    {
        $this->aR = $aR;
    }
}
