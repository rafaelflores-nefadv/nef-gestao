<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAtivos = \App\Models\User::where('active', true)->count();
        $porSetor = \App\Models\User::select('sector_id', \DB::raw('count(*) as total'))
            ->groupBy('sector_id')->get();
        $porRole = \App\Models\User::select('hierarchical_role_id', \DB::raw('count(*) as total'))
            ->groupBy('hierarchical_role_id')->get();
        $syncErrors = \App\Models\User::where('sync_status', 'error')->count();
        $desativados = \App\Models\User::where('active', false)->count();
        $logs = \DB::table('ad_sync_logs')->orderByDesc('id')->limit(10)->get();

        return view('dashboard', compact(
            'totalAtivos', 'porSetor', 'porRole', 'syncErrors', 'desativados', 'logs'
        ));
    }
}
