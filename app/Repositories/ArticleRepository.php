<?php 

namespace Sijot\Repositories;

use Sijot\Article;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;
use Illuminate\Pagination\Paginator;

/**
 * Class ArticleRepository
 *
 * @package Sijot\Repositories
 */
class ArticleRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model(): string
    {
        return Article::class;
    }

    /**
     * Get a list of articles in paginated version.
     * 
     * @param  int  $perPage  The amount of results u want to display per page.
     * @return \Illminate\Pagination\Paginator
     */
    public function getListing(int $perPage): Paginator
    {
        return $this->model->simplePaginate($perPage);
    }
}