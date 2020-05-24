<?php

namespace App\Hipuppy\Gateways;

use App\Hipuppy\Interfaces\BreedsRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;

class BreedsGateway
{
    use ValidatesRequests;


    public function __construct(BreedsRepositoryInterface $bR)
    {
        $this->bR = $bR;
    }
}
