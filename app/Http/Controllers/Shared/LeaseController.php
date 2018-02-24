<?php

namespace Sijot\Http\Controllers\Shared;

use Illuminate\Http\RedirectResponse;
use Sijot\Http\Requests\Frontend\Lease\StoreValidator;
use Sijot\Repositories\LeaseRepository;
use Sijot\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LeaseController
 * --- 
 * The lease logic that the fornt and backend have in common. 
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers\Shared
 */
class LeaseController extends Controller
{
    /**
     * Store a lease request in the database storage
     * 
     * @param  \Sijot\Http\Requests\Frontend\Lease\StoreValidator  $input  The given user input (Validated).
     * @param  \Sijot\Repositories\LeaseRepository                 $lease  The database wrapper for the lease database logic.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreValidator $input, LeaseRepository $lease): RedirectResponse
    {
        $guest = auth()->guest();

        // TODO: Create ->storeLease(<input>); Method
        if ($entry = $lease->storeLease($input->all())) { //! The lease has been stored in the database. 
            $lease->notifyAdmins($entry); // TODO: Create ->notifyAdmins(<db entry function>); 
            
            if ($guest) { //! Creator is not authenticated in the system. 
                $lease->confirmationRequester($enty);  // TODO: Create ->confirmationRequester(<db entry>);
            } 

            $lease->determineFlashSession($guest); // TODO: Create ->determineFlashSession(<auth gaurd>); 
        }

        return back(Response::HTTP_CREATED);
    }
}
