<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TeamPermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        $user = Auth::user();
        $teamId = session('current_team_id');

        if ($user && $user->hasPermissionTo($permission, $teamId)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
