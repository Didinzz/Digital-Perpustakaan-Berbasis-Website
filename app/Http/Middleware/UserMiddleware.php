<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // if (!in_array(auth()->user()->role, [User::ROLE_USER])) {
        //     return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        // }
        return $next($request);
    }
}
