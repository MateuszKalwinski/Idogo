<?php


namespace App\Policies;

use App\{User,TouristObject};
use Illuminate\Auth\Access\HandlesAuthorization;



class ObjectPolicy
{
    use HandlesAuthorization;


    public function __construct()
    {
        //
    }


    public function checkOwner(User $user, TouristObject $object)
    {
        return $user->id === $object->user_id;
    }
}
