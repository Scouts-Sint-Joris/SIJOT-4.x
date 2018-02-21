<?php

namespace Sijot\Http\Controllers\Backend;

use Sijot\User;
use Sijot\Http\Controllers\Controller;
use Sijot\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Sijot\Repositories\RoleRepository;

/**
 * Class UserController 
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     \Sijot\Http\Controllers\Backend
 */
class UserController extends Controller
{
    /** @var \Sijot\Repositories\UserRepository $users */
    private $users; 
    
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
        return view('backend.users.index', ['users' => $this->users->getListing(15)]);
    }

    /**
     * Create view for a new user. (Login)
     * 
     * @param  \Sijot\Repositories\RoleRepository  $roles  Used for the role listing in the form.
     * @return \Illuminate\View\View
     */
    public function create(RoleRepository $roles): View
    {
        return view('backend.users.create', ['role' => $roles->all(['name'])]);
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
     * ---
     * Returns HTTP/1 - 404 When no user is found in the database storage. 
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
     * ---
     * Returns HTTP/1 - 404 When no user is found in the database storage. 
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
     * ---
     * Returns HTTP/1 - 404 When no user is found in the database storage. 
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
     * ---
     * Returns HTTP/1 - 404 When no user is found in the database storage. 
     * 
     * @param  \Sijot\User  $user  The database entity from the user. 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        //
    }
}
