<?php

namespace Sijot\Policies;

use Sijot\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class UserPolicy
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2008 Tim Joosten
 * @package     Sijot\Policies
 */
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Sijot\User  $user   Session entity from the authenticated user
     * @param  \Sijot\User  $model  Database entity from the given user.
     * @return mixed
     */
    public function createBan(User $user, User $model)
    {
        return $user->id !== $model->id && $user->hasRole('admin');
    }
}
