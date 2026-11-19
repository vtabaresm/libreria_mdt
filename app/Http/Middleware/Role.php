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
        //1. Los roles permitidos llegan desde la ruta separados por | (por ejemplo: 'role:admin|reader')
        $rolesPermitidos = explode('|', $roles);

        //2. Rol del usuario que inició sesión
        $rolUsuario = strtolower($request->user()->role);

        //3. Si su rol no está permitido, se responde con error 403 (acceso prohibido)
        if (!in_array($rolUsuario, $rolesPermitidos)) {
            abort(403, 'No tiene permisos para realizar esta acción.');
        }

        //Si el rol está permitido, la petición continúa hacia el controlador
        return $next($request);
    }
}
