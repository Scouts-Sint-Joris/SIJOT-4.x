<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class DefaultController
 *
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     App\Http\Controllers\Frontend
 */
class DefaultController extends Controller
{
    /**
     * Get the frontpage for the web platform.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('welcome', [
            'posts' => [],
        ]);
    }
}
