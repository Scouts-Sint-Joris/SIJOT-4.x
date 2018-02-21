<?php 

namespace Sijot\Repositories;

use Sijot\User;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Cog\Laravel\Ban\Models\Ban;

/**
 * Class RestrictRepository
 *
 * @package Sijot\Repositories
 */
class RestrictRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * Create the ban restriction in the database
     * 
     * @param  \Sijot\User  $user  The database entity from the database 
     * @return \Cog\Laravel\Ban\Models\Ban
     */
    public function create($user): Ban
    {
        return $user->ban();
    }

    public function revoke(): bool 
    {

    }
}