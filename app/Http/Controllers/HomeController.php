<?php

namespace Sijot\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class HomeController
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param  \Sijot\Repositories\LeaseRepository    $leases    Database abstraction layer for the leases.
     * @param  \Sijot\Repositories\UserRepository     $users     Database abstraction later for the users.
     * @param  \Sijot\Repositories\ArticleRepository  $articles  Database abstraction layer for the articles
     * @return \Illuminate\Http\Response
     */
    public function index(LeaseRepository $leases, UserRepository $users, ArticleRepository $articles)
    {
        return view('home', [
            'counts' => ['lease' => $lease->countLeases(), 'users' => $users->countUsers(), 'articles' => $articles->countArticles()], 
            'leases' => $leases->getNewLeases(6)
        ]);
    }
}
