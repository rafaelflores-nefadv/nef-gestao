<?php

namespace App\Http\Controllers\Governance;

use App\Http\Controllers\Controller;
use App\Models\SystemPermission;

class SystemPermissionController extends Controller
{
    public function index()
    {
        $permissions = SystemPermission::orderBy('key')->get();

        return view('governance.system-permissions.index', compact('permissions'));
    }
}
