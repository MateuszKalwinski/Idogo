<?php

namespace App\Hipuppy\Gateways;


use App\Hipuppy\Interfaces\AddAnimalRepositoryInterface;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;


class AddAnimalGateway
{
    use ValidatesRequests;

    public function __construct(AddAnimalRepositoryInterface $aaR)
    {
        $this->aaR = $aaR;
    }
}
