<?php

namespace Sijot\Http\Controllers\Backend;

use Sijot\Http\Controllers\Controller;
use Sijot\Http\Requests\Backend\Articles\EditValidator;
use Sijot\Http\Requests\Backend\Articles\StoreValidator;
use Sijot\Repositories\ArticleRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class ArticleController
 *
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers\Backend
 */
class ArticleController extends Controller
{
    /** @var \Sijot\Repositories\ArticleRepository $articles */
    private $articles;

    /**
     * ArticleController constructor.
     *
     * @param  ArticleRepository $articles Abstraction layer between controller and database related logic.
     * @return void
     */
    public function __construct(ArticleRepository $articles)
    {
        $this->middleware(['auth']);
        $this->articles = $articles;
    }

    /**
     * Index listing for all the articles in the system. 
     * 
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('backend.articles.index', ['articles' => $this->articles->getListing(15)]); 
    }

    /**
     * Create view for a new article. 
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('backend.articles.create');
    }

    /**
     * Function for storing a new article in the database storage. 
     * 
     * @param  \Illuminate\Http\Requests\Backend\Articles\StoreValidator  $input  The user given input. (validated)
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreValidator $input): RedirectResponse
    {
        //
    }

    /**
     * Edit view for an article
     * --- 
     * Returns HTTP/1 404 when no article is found in the storage
     * 
     * @param  \Sijot\Article  $article  Database entity form the article 
     * @return \Illuminate\View\View
     */
    public function edit(Article $article): View
    {
        //
    }

    /**
     * Update an article in the database storage
     * ---
     * Returns HTTP/1 404 when no article is found in the storage
     * 
     * @param  \Sijot\Http\Requests\Backend\Articles\EditValidator  $input    User given input. (Validated)
     * @param  \Sijot\Article                                       $article  Database entity from the article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditValidator $input, Article $article): RedirectResponse
    {
        //
    }

    /**
     * Delete some article in the database storage
     * ---
     * Returns HTTP/1 404 when no article is found in the storage
     * 
     * @param  \Sijot\Article  $article  Database entity from the article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        //
    }
}
