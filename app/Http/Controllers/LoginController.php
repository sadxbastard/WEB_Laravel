<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function authenticate(Request $request) {
        $credentials = $request -> validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request -> session() -> regenerate();
            return redirect() -> intended('/types_of_activity')->withErrors([
                'success' => 'Вы успешно вошли в систему'
            ]);
        }
        return back() -> withErrors([
            'error' => 'The provided credentials do not match our records',
        ]) -> onlyInput('email', 'password');
    }

    public function login(Request $request) {
        return view('authorization', ['user' => Auth::user()]);
    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();
        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();
        return redirect('/')->withErrors([
            'success' => 'Вы успешно вышли из системы'
        ]);
    }
}
