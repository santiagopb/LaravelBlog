<?php

namespace Cronti\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Cronti\User;
use Cronti\Post;

class PostPolicy
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

    public function owner(User $user, Post $post)
    {
        if ($user->hasRole('Administrador')) { return true; }
        return ($user->id == $post->user_id);
    }
}
