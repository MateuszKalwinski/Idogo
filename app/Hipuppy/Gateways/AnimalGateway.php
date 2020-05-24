<?php

namespace App\Hipuppy\Gateways;

use App\Hipuppy\Interfaces\AnimalRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AnimalGateway
{

    use ValidatesRequests;

    public function __construct(AnimalRepositoryInterface $aR)
    {
        $this->aR = $aR;
    }
}
