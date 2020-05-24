<?php

namespace App\Hipuppy\Gateways;

use App\Hipuppy\Interfaces\ShelterRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ShelterGateway
{

    use ValidatesRequests;

    public function __construct(ShelterRepositoryInterface $sR)
    {
        $this->sR = $sR;
    }
}
