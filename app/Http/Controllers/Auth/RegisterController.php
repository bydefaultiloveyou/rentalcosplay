<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\User as ToolsUser;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Cookie as HttpFoundationCookie;

use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register.index');
    }

    public function store(RegisterRequest $request)
    {
        // validate add field
        $validate = $request->validated();

        if ($validate) {
            // check user in database
            if ($this->checkUserExist($validate['email'])) return redirect()
                ->back()
                ->with('error', 'Email sudah terdaftar');

            // hash and save a user
            $password = Hash::make($validate['password']);
            $user = User::create([...$validate, 'password' => $password]);

            // save to cookie
            $cookies = [
                $this->makeCookie('uuid', ToolsUser::ID('email', $request->email)),
                $this->makeCookie('authenticated', true),
            ];

            // save to session
            $request->session()->put('uuid', ToolsUser::ID('email', $request->email));

            // if user seller return redirect to seller account
            if ($request->cookie('authAs')) return redirect()
                ->route('register.dashboard.create')
                ->with('error', 'Silahkan daftar sebagai penguna terlebih dahulu')
                ->withCookies([...$cookies, Cookie::forget('authAs')]);

            // redirect to home page if store is done
            return  redirect()
                ->route('home.index')
                ->with('success', 'Berhasil Membuat Akun!!')
                ->withCookies($cookies);
        } else {
            // if proccess valid redirecr to register page
            return redirect()->back();
        }
    }

    // function make a cookie
    private function makeCookie(string $key, string $value): HttpFoundationCookie
    {
        return Cookie::make($key, $value, 10080);
    }

    private function checkUserExist($email): bool
    {
        // get a user where email is same with register field
        $userExist = User::where('email', $email)->first();

        // return true if user exist
        return $userExist ? true : false;
    }
}
