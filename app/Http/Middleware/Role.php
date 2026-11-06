<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        //Los roles permitidos llegan separados por | (por ejemplo: admin|reader)
        $newRol = explode('|', $roles);
        $roleName = strtolower($request->user()->role);
        if (!in_array($roleName, $newRol))
            return abort(403, __('Unauthorized'));
        return $next($request);
    }
}
