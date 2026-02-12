<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckSectorScope
{
    public function handle(Request $request, Closure $next)
    {
        $authUser = auth()->user();
        $targetUser = $request->route('user');

        if (!$authUser || !$targetUser instanceof User) {
            return abort(403);
        }

        // 1) Super admin
        if ($authUser->is_super_admin) {
            return $next($request);
        }

        // 2) Diretor
        if ($authUser->hierarchicalRole && $authUser->hierarchicalRole->level >= 100) {
            return $next($request);
        }

        // 3) Gestor
        if ($authUser->hierarchicalRole && $authUser->hierarchicalRole->level >= 70 && $authUser->hierarchicalRole->level < 100) {
            // user_sectors: setores vinculados ao gestor
            $userSectorIds = $authUser->user_sectors()->pluck('sector_id')->toArray();
            if (in_array($targetUser->sector_id, $userSectorIds)) {
                return $next($request);
            }
            return abort(403);
        }

        // 4) Supervisor
        if ($authUser->hierarchicalRole && $authUser->hierarchicalRole->level >= 40 && $authUser->hierarchicalRole->level < 70) {
            if ($targetUser->sector_id == $authUser->sector_id && $targetUser->hierarchicalRole->level < $authUser->hierarchicalRole->level) {
                return $next($request);
            }
            return abort(403);
        }

        // 5) Colaborador
        if ($authUser->hierarchicalRole && $authUser->hierarchicalRole->level < 40) {
            if ($authUser->id == $targetUser->id) {
                return $next($request);
            }
            return abort(403);
        }

        return abort(403);
    }
}
