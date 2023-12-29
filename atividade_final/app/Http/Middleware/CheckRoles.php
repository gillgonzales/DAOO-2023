<?php

// CheckRoles.php

namespace App\Http\Middleware;

use Closure;

class CheckRoles
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        if (!$user || !in_array($user->role, $roles)) {
            return response()->json(['error' => 'Unauthorized.'], 403);
        }

        return $next($request);
    }
}

