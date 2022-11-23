<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $stats =[];

//        12 month each company registration count with zero count
        $companies = Company::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->get();
        for ($i = 1; $i <= 12; $i++) {
            if ($companies->where('month', $i)->isEmpty()) {
                $stats['count'][] = 0;
            }else{
                $stats['count'][] = $companies->where('month', $i)->first()->count;
            }
        }

        return Inertia::render("Admin/Dashboard",[
            'stats' => $stats['count'],
        ]);
    }
}
