<?php

namespace Sijot\Http\Controllers\Backend;

use Sijot\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
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
    /** @var \Sijot\Repositories\UserRepository $user */
    private $users; 

    /**
     * BlockController Constructor. 
     * 
     * @param  UserRepository  $users  Abstraction layer between controller and database related logic. 
     * @return void
     */
    public function __construct(UserRepository $users) 
    {
        $this->middleware(['auth']);
        $this->users = $users;
    }

    /**
     * Block a user in the application 
     * --- 
     * Returns HTTP/1 - 404 when no user is found. 
     * 
     * @param  int  $user  The unique identifier from the user in the database storage.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(): RedirectResponse
    {
        //
    }

    /**
     * Revoke a user ban in the system; 
     * ---
     * Returns HTTP/1 - 404 when no user is found. 
     * 
     * @param  int  $user  The uniqie identifier from the user in the database storage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        //
    }
}
