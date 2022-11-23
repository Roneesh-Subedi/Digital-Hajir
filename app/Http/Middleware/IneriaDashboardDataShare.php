<?php

namespace App\Http\Middleware;

use App\Models\Group;
use Closure;
use Illuminate\Http\Request;
use Inertia\Middleware;

class IneriaDashboardDataShare extends Middleware
{
    public function share(Request $request)
    {
//        dd($request);
        //share
        return array_merge(parent::share($request), [
            'groups'=>Group::select(['id', 'slug', 'name'])
                ->withCount('subgroups')
                ->where('company_id', auth()->user()->company_id)
                ->get(),
            'flash' => [
                'success' => session('success'),
                'error' => session('error'),
                'instruction' => session('instruction'),
            ],
        ]);
    }
}
