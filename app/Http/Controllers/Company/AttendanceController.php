<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Attendance;
use App\Models\Group;
use App\Models\Subgroup;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Subgroup $subgroup)
    {
        $subgroup->loadCount('members as total_members')->load('group');
        $attendances = Attendance::select(['attendances.*','groups.name as group_name','subgroups.name as subgroup_name'])
            ->join('subgroups', 'subgroups.id', '=', 'attendances.subgroup_id')
            ->join('groups', 'groups.id', '=', 'subgroups.group_id')
            ->where('groups.company_id', auth()->user()->company_id)
            ->where('subgroups.id', $subgroup->id)
            ->withCount('members as present_members')
            ->orderBy('attendances.created_at', 'desc')
            ->paginate(9);

        return Inertia::render("Company/Attendance", compact('attendances', 'subgroup'));
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
     * @param  \App\Http\Requests\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAttendanceRequest $request)
    {
        $attendance = Attendance::create([
            'title' => $request->title,
            'subgroup_id' => $request->subgroup_id,
            'date' => $request->date,
        ]);
        return redirect()->route('company.attendance.edit',[
            'attendance' => $attendance->id,
        ])->with('success', 'Attendance created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Inertia\Response
     */
    public function edit(Attendance $attendance)
    {
        $members = $attendance->subgroup->members;
        $attendMembers = $attendance->members->pluck('id')->toArray();
        return Inertia::render("Company/Attendance/Edit", compact('attendance', 'members','attendMembers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceRequest  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $attendance->update($request->only('title', 'date'));
        $attendance->members()->sync($request->attendMembers);
        return redirect()->route('company.attendance.index',[
            'subgroup' => $attendance->subgroup->slug
        ])->with('success', 'Attendance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return back()->with('danger', "Deleted");
    }
}
