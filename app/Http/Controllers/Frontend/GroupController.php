<?php

namespace Sijot\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Sijot\Http\Controllers\Controller;
use Sijot\Repositories\GroupRepository;

/**
 * Class GroupController 
 * --- 
 * Controller for the groups in the organisation
 * 
 * @author      Tim Joosten <topairy@gmail.com>
 * @copyright   2018 Tim Joosten
 * @package     Sijot\Http\Controllers\Frontend
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
        $this->groups = $groups;
    }

    /**
     * Get the listing from all the groups in the system. 
     * 
     * @return \Illuminate\View\View
     */
    public function index(): View 
    {
        return view('frontend.groups.index', ['groups' => '']);
    }

    /**
     * Show a specific group in the application. 
     * 
     * @param  string  $slug  The unique identifier (slug) for the group.
     * @return \Illuminate\View\View
     */
    public function show(string $slug): View 
    {
        return view('frontend.groups.show', [
            'group' => $this->groups->getGroup($group)
        ]);
    }
}
