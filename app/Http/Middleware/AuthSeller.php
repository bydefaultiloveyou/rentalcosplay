<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authenticated = $request->cookie('authenticated');

        $user = User::find($request->cookie('uuid'));

        if ($authenticated and $user->role == 'seller') return redirect()->route('dashboard.index');

        if (!$authenticated) {
            return redirect()->route('login.create')
                ->withCookie(Cookie::make('authAs', 'seller'));
        }

        return $next($request);
    }
}
