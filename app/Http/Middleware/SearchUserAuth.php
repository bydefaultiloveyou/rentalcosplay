<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class SearchUserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $uuid = $request->cookie('uuid');
        $authenticated = $request->cookie('authenticated');

        $user = User::find($uuid);

        if ($authenticated) {
            if ($user == null) {
                $request->session()->flush();

                // Redirect and delete authentication cookies
                return redirect(route('home.index'))->withCookies([Cookie::forget('uuid'), Cookie::forget('authenticated')]);
            }
        }


        return $next($request);
    }
}
