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
     * @return \Illuminate\Pagination\Paginator
     */
    public function getListing(int $perPage): Paginator
    {
        return $this->model->simplePaginate($perPage);
    }

    /**
     * Get a list of articles in paginated format for the index page. 
     * 
     * @param  int  $perPage  The amount of results u want to display per Page; 
     * @return \Illuminate\Pagination\Paginator
     */
    public function getFrontendListing($perPage): Paginator
    {   
        return $this->model->where('status', true)
            ->orderBy('created_at', 'ASC')
            ->simplePaginate($perPage);
    }

    /**
     * Determine the flash session. Based on the status. 
     * 
     * @param  bool  $status  type indicator for the status. 
     * @return mixed
     */
    public function determineFlashSession(bool $status)
    {
        switch ($status) {
            case true:  return flash('public')->success();
            case false: return flash('draft')->warning();
        }
    }
}