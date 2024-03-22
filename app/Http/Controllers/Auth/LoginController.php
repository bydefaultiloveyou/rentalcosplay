<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\User as ToolsUser;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Cookie as HttpFoundationCookie;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login.index');
    }

    public function store(Request $request)
    {
        // get user by email in databse
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('register.create')->with('error', 'User belum terdaftar silahkan daftar terlebih dahulu');
        }

        // check if user is same
        if ($user->email == $request->email) {

            // check a password
            if (Hash::check($request->password, $user->password)) {

                // save to cookie
                $cookies = [
                    $this->makeCookie('uuid', ToolsUser::ID('email', $request->email)),
                    $this->makeCookie('authenticated', true)
                ];

                // save to session
                $request->session()->put('username', $user->username);

                if ($request->cookie('authAs')) return redirect()
                    ->route('register.dashboard.create')
                    ->with('error', 'Silahkan daftar sebagai penguna terlebih dahulu')
                    ->withCookies([...$cookies, Cookie::forget('authAs')]);

                // redirect to home and show flash
                return redirect()->route('home.index')->with('success', 'Berhasil Login')->withCookies($cookies);
            }

            // if password in correct redirect
            return redirect()->route('login.create')->with('error', 'Password salah');
        }

        // if email not same redirect
        return redirect()->route('login.create')->with('error', 'Email tidak terdaftar');
    }

    // function make a cookie
    private function makeCookie(string $key, string $value): HttpFoundationCookie
    {
        return Cookie::make($key, $value, 10080);
    }
}
