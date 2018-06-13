<?php

namespace App\Policies;


use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

use App\User;
use Auth;

class UserPolicy
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


    public function verify_user_edit_profile(User $user, $url){
        return $user->id == $url->id;
    }
    

    
}
