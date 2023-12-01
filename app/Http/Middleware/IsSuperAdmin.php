<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    /**
     * Han
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->role != 'super_admin') {
            return response()->json(
                [
                    "success" => false,
                    "message" => "Unauthorized"
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }

        return $next($request);
    }
}
