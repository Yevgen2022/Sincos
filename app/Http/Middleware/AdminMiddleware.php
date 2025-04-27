<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */

    public function handle(Request $request, Closure $next)
    {

      // Checking if the user is authenticated
//        $user = auth()->user();
//        if ($user && $user->role_id !== 1) {
        if (!auth()->check() || auth()->user()->role_id !== 1) {
            return redirect()->route('home');
        }
        return $next($request);

    }


}
