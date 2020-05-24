<?php

namespace App\Hipuppy\Gateways;

use App\Hipuppy\Interfaces\SheltersRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SheltersGateway

{

    use ValidatesRequests;

    public function __construct(SheltersRepositoryInterface $sR)
    {
        $this->sR = $sR;
    }
}
