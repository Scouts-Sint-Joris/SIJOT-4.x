<?php 

namespace Sijot\Repositories;

use Sijot\Group;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class GroupRepository
 *
 * @package Sijot\Repositories
 */
class GroupRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Group::class;
    }
}