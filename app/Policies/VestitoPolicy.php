<?php

namespace App\Policies;

use App\User;
use App\Vestito;
use Illuminate\Auth\Access\HandlesAuthorization;

class VestitoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Vestito $vestito)
    {
        return $vestito->user_id == $user->id;
    }
}
