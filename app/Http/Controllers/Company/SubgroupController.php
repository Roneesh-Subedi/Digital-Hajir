<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubgroupRequest;
use App\Http\Requests\UpdateSubgroupRequest;
use App\Models\Member;
use App\Models\Subgroup;

class SubgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        return inertia('Company/Subgroup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubgroupRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSubgroupRequest $request)
    {
        Subgroup::create($request->validated());
        return back()->with('success', 'Subgroup created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subgroup  $subgroup
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function show(Subgroup $subgroup)
    {
        $members = Member::select([
            'members.id',
            'members.name',
            'members.avatar',
            'subgroups.name as sub_group_name',
            'groups.name as group_name',
        ])->join('subgroups', 'subgroups.id', '=', 'members.subgroup_id')
            ->join('groups', 'groups.id', '=', 'subgroups.group_id')
            ->where('groups.company_id', auth()->user()->company_id)
            ->orderBy('members.id', 'desc')
            ->where('subgroups.id', $subgroup->id)
            ->when(request('search'), function ($query) {
                return $query->where('members.name', 'like', '%' . request('search') . '%');
            })
            ->paginate(9);

//        dd(Member::first()->toArray());
        return inertia('Company/Members', compact('members', 'subgroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subgroup  $subgroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Subgroup $subgroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubgroupRequest  $request
     * @param  \App\Models\Subgroup  $subgroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubgroupRequest $request, Subgroup $subgroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subgroup  $subgroup
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Subgroup $subgroup)
    {
        $subgroup->members()->delete();
        $subgroup->delete();
        return back()->with('success', [
            'message' => 'Subgroup deleted successfully',
        ]);
    }
}
