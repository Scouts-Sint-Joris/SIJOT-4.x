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
        if ($user = $this->users->create($input->all())) {
            $this->addActivity($user, "Heeft een login aan aangemaakt voor {$user->name}");
            flash("Er is een login aangemaakt voor {$user->name} in de website.")->success();
        }

        return redirect()->route('gebruikers.index');
    }

    /**
     * Show a the information from a specifc user in the system.
     * ---
     * Returns HTTP/1 - 404 When no user is found in the database storage. 
     * 
     * @param  int  $user  The database entity from the user.
     * @return \Illuminate\View\View
     */
    public function show(int $user): View
    {
        $user = $this->users->findOrFail($user);
    }

    /**
     * The edit view for the given user entity. 
     * ---
     * Returns HTTP/1 - 404 When no user is found in the database storage. 
     * 
     * @param  int  $user  The database entity from the user.
     * @return \Illuminate\View\View
     */
    public function edit(int $user): View
    {
        return view('backend.users.edit', ['user' => $this->users->findOrFail($user)]); 
    }

    /**
     * Update u user in the database. 
     * ---
     * Returns HTTP/1 - 404 When no user is found in the database storage. 
     * 
     * @param  \Sijot\Http\Requests\Backend\Users\UpdateValidator  $input  The given user input. (Validated)
     * @param  int                                                 $user   The database entity from the user. 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateValidator $input, int $user): RedirectResponse
    {
        $user = $this->users->findOrFail($user); 

        if ($user->update()) {
            $this->addActivity($user, "Heeft de gebruiker {$user->name} gewijzigd in the systeem.");
            flash($user->name . 'is aangepast in het systeem.')->success();
        }

        return redirect()->route('gebruikers.show', $user);
    }

    /**
     * Delete a user in the database storage
     * ---
     * Returns HTTP/1 - 404 When no user is found in the database storage. 
     * 
     * @param  int  $user  The database entity from the user. 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $user): RedirectResponse
    {
        $user = $this->users->findOrFail($user); 

        if ($user->delete()) {
            $this->logActivity($user, 'Heeft een login verwijderd uit het systeem.');
            flash("De login voor {$user->name} is verwijderd uit de applicatie")->success()->important();
        }

        return redirect()->route('gebruikers.index');
    }
}
