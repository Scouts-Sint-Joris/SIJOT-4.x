<?php

namespace Sijot\Http\Controllers\Backend;

use Illuminate\Http\RedirectRespons;
use Illuminate\View\View;
use Sijot\Http\Controllers\Controller;
use Sijot\Http\Requests\Backend\Groups\EditValidator;
use Sijot\Repositories\GroupRepository;

/**
 * Class GroupController
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers\Backend
 */
class GroupController extends Controller
{
    /** @var \Sijot\Repositories\GroupRepository $groups */
    private $groups; 

    /**
     * GroupController constructor 
     * 
     * @return void
     */
    public function __construct(GroupRepository $groups)
    {
        $this->middleware(['auth']);
        $this->groups = $groups;
    }

    /**
     * The edit view for the groups. 
     * 
     * @return \Illuminate\View\View
     */
    public function index(): View  
    {
        return view('backend.groups.index', ['groups' => $this->groups->all()]); 
    }

    /**
     * The update method to change a goup in the database storage. 
     * 
     * @param  \Sijot\Http\Requests\Backend\Groups\EditValidator  $input  The given user input. (Validated)
     * @param  string                                             $slug   The uniqie identifier in the database.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditValidator $input, string $slug): RedirectResponse
    {
        $group = $this->groups->getGroup($slug); // TODO: Register ->getGroup() method

        if ($group->update($input->all())) { //! The group has been udated. 
            flash("De tak ({ $group->name }) is aangepast in de website.")->success();
        }

        return redirect()->route('groups.index', ['slug' => $group->slug]);
    }
}
