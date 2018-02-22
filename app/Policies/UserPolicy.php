<?php

namespace Sijot\Policies;

use Sijot\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class UserPolicy
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can block another user.
     *
     * @param  \Sijot\User  $user   Session entity from the authenticated user
     * @param  \Sijot\User  $model  Database entity from the given user.
     * @return bool
     */
    public function createBan(User $user, User $model): bool
    {
        return $user->id !== $model->id && $user->hasRole('admin');
    }

    /**
     * Determine whether the user can revoke user bans or not. 
     * 
     * @param  \Sijot\User  $user   Session entity from the authenticated user.
     * @param  \Sijot\User  $model  Database entity from the given user.
     * @return bool
     */
    public function revokeBan(User $user, User $model): bool
    {
        return $user->id !== $model->id && $user->hasRole('admin');
    }
}
