<?php


namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;



class RoomPolicy
{
    use HandlesAuthorization;


    public function __construct()
    {
        //
    }



    public function checkOwner(User $user, \App\Room $room)
    {
        return $user->id === $room->object->user_id;
    }
}
