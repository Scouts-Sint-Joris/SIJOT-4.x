<?php

namespace Sijot\Http\Controllers\Backend\Lease;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Sijot\Http\Controllers\Controller;
use Sijot\Repositories\LeaseRepository;

/**
 * Class LeaseController
 *
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers\Backend\Lease
 */
class LeaseController extends Controller
{
    /** @var \Sijot\Repositories\LeaseRepository $leases */
    private $leases;

    /**
     * LeaseController constructor.
     *
     * @param  LeaseRepository  $leases  Abstraction layer between controller and database related logic.
     * @return void
     */
    public function __construct(LeaseRepository $leases)
    {
        $this->middleware(['auth', 'forbid-banned-user']);
        $this->leases = $leases;
    }

    /**
     * Get the backend index management console for the lease requests.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('backend.lease.index', [
            'leases' => $this->leases->getListing(15)
        ]);
    }

    /**
     * Backend create view for a new lease
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('backend.lease.create');
    }

    /**
     * Delete a lease in the database storage
     *
     * @param  int  $lease The unique identifier from the lease in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $lease): RedirectResponse
    {
        $lease = $this->leases->findOrFail($lease);

        if ($lease->delete()) { // Lease has been deleted
            $this->logActivity($lease, 'Heeft een verhuring verwijderd in het systeem.');
            flash("De verhuur van {$lease->groep} is verwijderd in het systeem.")->success();
        }

        return redirect()->route('lease.index');
    }
}
