<?php

namespace Sijot\Http\Controllers\Backend;

use Gate;
use Sijot\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Sijot\Repositories\RestrictRepository;
use Sijot\Repositories\UserRepository;

/**
 * Class BlockController
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers\Backend
 */
class BlockController extends Controller
{
    /** @var \Sijot\Repositories\RestrictRepository $restriction */
    private $restriction; 

    /** @var \Sijot\Repositories\UserRepository $user */
    private $user;

    /**
     * BlockController Constructor. 
     * 
     * @param  UserRepository      $user         Abstraction layer between controller and database related logic.
     * @param  RestrictRepository  $restriction  Abstraction layer between controller and database related logic. 
     * @return void
     */
    public function __construct(UserRepository $user, RestrictRepository $restriction) 
    {
        $this->middleware(['auth']);

        $this->user        = $user;
        $this->restriction = $restriction;
    }

    /**
     * Block a user in the application 
     * --- 
     * Returns HTTP/1 - 404 when no user is found. 
     * 
     * @todo Implementatie mail notification to the blocked user.
     * 
     * @param  int  $user  The unique identifier from the user in the database storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $user): RedirectResponse
    {
        $user = $this->user->findOrFail($user); 

        if (Gate::allows('create-ban', $user)) {     //! The given user entity is not the same then the authenticated user
            if ($this->restriction->create($user)) { //! The given user is blocked in the database
                $this->logActivity($user,  "Heeft {$user->name} voor 2 weken geblokkeerd in de website");
                flash($user->name . ' is geblokkeerd in de applicatie voor 2 weken.')->success()->important();
            }
        } else { //! User is the same then the authenticated user.
            flash('Helaas! Je kunt jezelf niet blokkeren in de applicatie!')->warning()->important();
        }

        return redirect()->route('gebruikers.index');
    }

    /**
     * Revoke a user ban in the system; 
     * ---
     * Returns HTTP/1 - 404 when no user is found. 
     * 
     * @param  int  $user  The uniqie identifier from the user in the database storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $user): RedirectResponse
    {
       $user = $this->user->findOrFail($user);

       if (Gate::allows('revoke-ban', $user)) { //! The given user entity is not the same then the authenticated user
           $this->restriction->revoke($user);   //! The given user his ban is revoked in the database
           $this->logActivity($user, "Heeft de blokkering van {$user->name} opgeheven");
           flash($user->name . " is terug geactiveer in de applicatie.")->success()->important();
       } else {
           //! User is the samen then the authenticated user.
           flash('Helaas! Je kunt jezelf niet blokkeren in de applicatie!')->warning()->important();
       }

       return redirect()->route('gebruikers.index');
    }
}
