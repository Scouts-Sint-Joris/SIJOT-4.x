<?php

namespace Sijot\Http\ViewComposers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\View\View;

/**
 * Class GlobalComposer
 * ---
 * The view composer file that applies to all views.
 *
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\ViewComposers
 */
class GlobalComposer
{
    /** @var \Illuminate\Contracts\Auth\Guard $auth  */
    protected $auth;

    /**
     * Create a new global layout composer.
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth  The authentication guard.
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view  The view contract form laravel.
     * @return void
     */
    public function compose(View $view): void
    {
        $view->with('currentUser', $this->auth->user());
    }
}