<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Member;
use App\Models\Subgroup;
use Inertia\Inertia;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        return inertia('Company/Group');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        return back()->with('instruction', [
            'open_create_group_modal' => true,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGroupRequest $request)
    {
        $data = $request->validated();
        Group::create($data);
        return back()->with('success', 'Group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function show(Group $group)
    {
        $group = $group->load(['subgroups'=> function ($query) {
            $query->select('id', 'name', 'slug', 'group_id')
                ->where('deleted_at', null)
                ->withCount(['members' => function ($query) {
                    $query->where('deleted_at', null);
                }]);
        }]);
        return inertia('Company/Subgroup',[
            'group' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Group $group)
    {
//        inertia return back with $group and 'instruction'
        Inertia::share('edit_group', $group);
        return back()->with('instruction', [
            'open_create_group_modal' => true,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return back()->with('success', [
            'message' => 'Group deleted successfully.',
        ]);
    }
}
