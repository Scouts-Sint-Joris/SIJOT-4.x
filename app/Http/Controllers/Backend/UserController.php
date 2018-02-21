<?php

namespace Sijot\Http\Controllers\Backend;

use Sijot\User;
use Sijot\Http\Controllers\Controller;
use Sijot\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class UserController 
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     \Sijot\Http\Controllers\Backend
 */
class UserController extends Controller
{
    /**
     * UserController constructor. 
     * 
     * @param  UserRepository $users    Abstraction layer between controller and database related stuff. 
     * @return void
     */
    public function __construct(UserRepository $users) 
    {
        $this->middleware(['auth']);
        $this->users = $users;
    }

    /**
     * Listing view for all the users. (logins)
     * 
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('backend.users.index');
    }

    /**
     * Create view for a new user. (Login)
     * 
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('backend.users.create');
    }

    /**
     * Store a new user in the database storage
     * 
     * @param  \Sijot\Http\Requests\Backend\Users\StoreValidator  $input  The given user input. (Validated)
     * @return \Illumiate\Http\RedirectResponse
     */
    public function store(StoreValidator $input): RedirectResponse
    {
        //
    }

    /**
     * Show a the information from a specifc user in the system.
     * 
     * @param  \Sijot\User  $user  The database entity from the user.
     * @return \Illuminate\View\View
     */
    public function show(User $user): View
    {
        //
    }

    /**
     * The edit view for the given user entity. 
     * 
     * @param  \Sijot\User  $user  The database entity from the user.
     * @return \Illuminate\View\View
     */
    public function edit(User $user): View
    {
        //
    }

    /**
     * Update u user in the database. 
     * 
     * @param  \Sijot\Http\Requests\Backend\Users\UpdateValidator  $input  The given user input. (Validated)
     * @param  \Sijot\User                                         $user   The database entity from the user. 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateValidator $input, User $user): RedirectResponse
    {
        //
    }

    /**
     * Delete a user in the database storage
     * 
     * @param  \Sijot\User  $user  The database entity from the user. 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        //
    }
}
