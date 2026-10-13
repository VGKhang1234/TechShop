<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function loginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return to_route('home');
        }

        return view('auth.login');
    }

    public function registerForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return to_route('home');
        }

        return view('auth.register');
    }

    public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:190'],
            'password' => ['required', 'string'],
        ]);

        $credentials = [
            'email' => mb_strtolower($validated['email']),
            'password' => $validated['password'],
            'status' => 'active',
        ];

        if (! Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Email hoặc mật khẩu không chính xác.'])->onlyInput('email');
        }

        app(CartService::class)->mergeGuestCartIntoUser(Auth::user(), $request->session()->getId());
        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190', 'unique:users,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'terms' => ['accepted'],
        ]);

        $user = User::query()->create([
            'name' => $validated['name'],
            'email' => mb_strtolower($validated['email']),
            'phone' => $validated['phone'] ?? null,
            'password_hash' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        app(CartService::class)->mergeGuestCartIntoUser($user, $request->session()->getId());
        $request->session()->regenerate();

        return to_route('home');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home');
    }
}