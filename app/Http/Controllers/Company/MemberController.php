<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorememberRequest;
use App\Http\Requests\UpdatememberRequest;
use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index(Request $request)
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
            ->when($request->search, function ($query) use ($request) {
                return $query->where('members.name', 'like', '%' . $request->search . '%');
            })
            ->orderBy('members.id', 'desc')
            ->paginate(9);
        return inertia('Company/Members', compact('members'));
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
     * @param  \App\Http\Requests\StorememberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorememberRequest $request)
    {
        $data = $request->validated();
        $member = Member::create([
            'name' => $data['name'],
            'subgroup_id' => $data['subgroup_id'],
            'avatar' => $request->hasFile('avatar') ? $request->file('avatar')->store('avatars',) : null,
            'details' => $data['details'],
        ]);
        return back()->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::selectRaw('members.*, subgroups.name as sub_group_name, groups.name as group_name')
            ->join('subgroups', 'subgroups.id', '=', 'members.subgroup_id')
            ->join('groups', 'groups.id', '=', 'subgroups.group_id')
            ->withCount('attendances')
            ->where('groups.company_id', auth()->user()->company_id)
            ->findOrFail($id);
        $member['total_attendances'] =  Attendance::where('subgroup_id', $member->subgroup_id)->count();

        return Inertia::render("Company/Members/Profile", compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatememberRequest  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatememberRequest $request, member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(member $member)
    {
        $member->delete();
        return back()->with('success', 'Member deleted successfully.');
    }
}
