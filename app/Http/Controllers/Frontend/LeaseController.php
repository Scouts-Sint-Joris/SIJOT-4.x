<?php

namespace Sijot\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Sijot\Http\Controllers\Controller;
use Illuminate\View\View;
use Sijot\Repositories\LeaseRepository;
use Illuminate\Http\RedirectResponse;
use Sijot\Http\Requests\Frontend\Lease\StoreValidator;

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
    public function calendar(): View 
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
    public function domainAccess(LeaseRepository $leases): iew 
    {
        return view();
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

    /**
     * Store a lease request in the database storage
     * 
     * @param  \Sijot\Http\Requests\Frontend\Lease\StoreValidator  $input  The given user input (Validated).
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreValidator $input): RedirectResponse
    {
        dd($input->all());
    }
}
