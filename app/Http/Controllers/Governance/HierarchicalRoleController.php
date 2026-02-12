<?php

namespace App\Http\Controllers\Governance;

use App\Http\Controllers\Controller;
use App\Models\HierarchicalRole;

class HierarchicalRoleController extends Controller
{
    public function index()
    {
        $roles = HierarchicalRole::orderByDesc('level')->get();

        return view('governance.hierarchical-roles.index', compact('roles'));
    }
}
