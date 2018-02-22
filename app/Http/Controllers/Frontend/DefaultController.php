<?php

namespace Sijot\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Sijot\Http\Controllers\Controller;
use Illuminate\View\View;
use Sijot\Repositories\ArticleRepository;

/**
 * Class DefaultController
 *
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers\Frontend
 */
class DefaultController extends Controller
{
    private $articles; 

    /**
     * Get the frontpage for the web platform.
     *
     * @param  \Sijot\Repositories\ArticleRepository $articles  The database layer for the articles
     * @return \Illuminate\View\View
     */
    public function index(ArticleRepository $articles): View
    {
        return view('welcome', ['posts' => $articles->getFrontendListing(5)]);
    }
}
