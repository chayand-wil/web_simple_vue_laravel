<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = auth('api')->user();

        // Si no hay usuario autenticado, retorna 401
        if (!$user) {
            return response()->json(['error' => 'No autenticado'], 401);
        }

        // Si no tiene el rol requerido, retorna 403
        if ($user->role !== $role) {
            return response()->json(['error' => 'No autorizado'], 403);
        }

        // Pasa al siguiente middleware
        return $next($request);
    }
}
