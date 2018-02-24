<?php

namespace Sijot\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Sijot\Http\Controllers\Controller;
use Illuminate\View\View;
use Sijot\Repositories\LeaseRepository;

/**
 * Class LeaseController 
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     SIjot\Http\Controllers\Frontend
 */
class LeaseController extends Controller
{
    /**
     * Frontend info page about the lease of the group domain
     *  
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('frontend.lease.index'); 
    }

    /**
     * The calendar for the conformed leases 
     * 
     * @param  \Sijot\Repositories\LeaseRepository  $leases  The database layer for the confirmed leases.
     * @return \Illuminate\View\View
     */
    public function calendar(LeaseRepository $leases): View 
    {
        return view('frontend.lease.calendar', [
            'leases' => [] // TODO: Build up the database query
        ]);
    }

    /**
     * Page where we descirbe the domain access
     * 
     * @return \Illuminate\View\View
     */
    public function domainAccess(LeaseRepository $leases): View 
    {
        return view('frontend.lease.access');
    }

    /**
     * Create view for some new lease request
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View 
    {
        return view('frontend.lease.create');
    }
}
