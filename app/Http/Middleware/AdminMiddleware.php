<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    // if (!auth()->user()) {
    //   return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
    // }

    // if (!in_array(auth()->user()->role, [User::ROLE_ADMIN])) {
    //   return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
    // }
    //     return $next($request);
    // }
}
