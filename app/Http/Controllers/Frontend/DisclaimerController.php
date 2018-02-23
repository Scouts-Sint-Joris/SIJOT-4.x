<?php

namespace Sijot\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Sijot\Http\Controllers\Controller;

/**
 * Class DisclaimerController
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers\Frontend
 */
class DisclaimerController extends Controller
{
    /**
     * The disclaimer page for the website. 
     * 
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('frontend.disclaimer.index');
    }

    /**
     * The privacy statement for the website. 
     * 
     * @return \Illuminate\View\View
     */
    public function privacyStatement(): View 
    {

    }
}
