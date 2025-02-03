<?php

namespace App\Http\Middleware;

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
    public function handle(Request $request, Closure $next): Response
    {
        // Перевіряємо, чи користувач аутентифікований
        $user = Auth::user();

        // Якщо користувач не аутентифікований
        if (!$user) {
            dd('No user found'); // Для відлагодження
        }

        // Якщо користувач існує і його роль адміністратора
        if ($user && $user->role === 'admin') {
//            dd('All rights');
            return $next($request);
        }

        return redirect('/')->with('error', 'Access denied!'); // If it's not admin, return to the main page
    }
}
