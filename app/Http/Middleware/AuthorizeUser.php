<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        if (!$user || !$user->level) {
            abort(403, 'kamu tidak memiliki akses ke halaman ini');
        }
        // Jika hanya satu role, $roles = ['ADM']
        // Jika banyak: authorize:ADM,MNG
        $roles = array_map('trim', $roles);
        if ($user->hasAnyRole($roles)) {
            return $next($request);
        }
        abort(403, 'kamu tidak memiliki akses ke halaman ini');
    }
}
