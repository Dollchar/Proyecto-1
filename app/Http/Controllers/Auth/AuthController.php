<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    // ── SHOW FORMS ────────────────────────────────

    public function showLogin()
    {
        if (Auth::check()) return redirect('/');
        return view('auth.login');
    }

    public function showRegister()
    {
        if (Auth::check()) return redirect('/');
        return view('auth.register');
    }

    // ── LOGIN ─────────────────────────────────────

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('toast_success', '¡Bienvenido de vuelta!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // ── REGISTER ──────────────────────────────────

    public function register(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ], [
            'name.required'       => 'El nombre es obligatorio.',
            'email.required'      => 'El correo es obligatorio.',
            'email.unique'        => 'Este correo ya está registrado.',
            'password.confirmed'  => 'Las contraseñas no coinciden.',
            'password.min'        => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'status'   => 1,
        ]);

        Auth::login($user);

        return redirect('/')->with('toast_success', '¡Cuenta creada con éxito! Bienvenido a Kuke\'s.');
    }

    // ── LOGOUT ────────────────────────────────────

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
