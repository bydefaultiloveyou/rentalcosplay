<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotSeller
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

        if (!$authenticated) return redirect()->route('home.index');

        if ($user->role != 'seller') return redirect()->route('home.index');

        return $next($request);
    }
}
