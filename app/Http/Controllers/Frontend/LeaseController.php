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
    /** @var \Sijot\Repositories\LeaseRepository $lease */
    private $leases;

    /**
     * LeaseController constructor
     * 
     * @return void
     */
    public function __construct(LeaseRepository $leases) 
    {
        $this->leases = $leases;
    }

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
     * @return \Illuminate\View\View
     */
    public function calendar(): View 
    {
        return view(); 
    }

    /**
     * @return \Illuminate\View\View
     */
    public function domainAccess(): iew 
    {

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
