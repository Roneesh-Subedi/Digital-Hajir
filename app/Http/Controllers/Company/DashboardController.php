<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Member;
use App\Models\Subgroup;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $groups = Group::where('company_id', auth()->user()->company_id);

        $groups_count = $groups->count();
        $subgroups = Subgroup::whereIn('group_id', $groups->pluck('id'))->get();
        $subgroups_count = $subgroups->count();
        $members = Member::whereIn('subgroup_id', $subgroups->pluck('id'))->get();
        $members_count = $members->count();

        return inertia('Company/Dashboard', [
            'groups_count' => $groups_count,
            'subgroups_count' => $subgroups_count,
            'members_count' => $members_count,
        ]);
    }
}
