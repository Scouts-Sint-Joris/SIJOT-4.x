<?php 

namespace Sijot\Repositories;

use Illuminate\Pagination\Paginator;
use Sijot\Lease;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class LeaseRepository
 *
 * @package Sijot\Repositories
 */
class LeaseRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Lease::class;
    }

    /**
     * Get all the leases from the database storage in paginated format.
     *
     * @param  int  $perPage  Te amount of results u want to display per page.
     * @return \Illuminate\Pagination\Paginator
     */
    public function getListing(int $perPage): Paginator
    {
        return $this->model->simplePaginate($perPage);
    }
}