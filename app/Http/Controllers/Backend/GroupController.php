<?php

namespace Sijot\Http\Controllers\Backend;

use Illuminate\Http\RedirectRespons;
use Sijot\Http\Controllers\Controller;
use Illuminate\View\View;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(): RedirectResponse
    {

    }
}
