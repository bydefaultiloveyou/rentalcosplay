<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class RegisterController extends Controller
{
    public function create(Request $request): View
    {
        return view('dashboard.register.create');
    }

    public function store(Request $request): RedirectResponse
    {

        User::where('id', $request->cookie('uuid'))->update([
            'username_instagram' => $request->username_instagram,
            'domisili' => $request->domisili,
            'role' => 'seller'
        ]);

        return redirect()
            ->route('dashboard.index')
            ->with('success', 'Berhasil mendaftar sebagai seller');
    }
}
