<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect to Google OAuth.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback — find or create user, then log in.
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Throwable $e) {
            return redirect()->route('login')
                ->withErrors(['google' => 'No se pudo autenticar con Google. Intenta de nuevo.']);
        }

        // Find existing user by google_id or email
        $user = User::where('google_id', $googleUser->getId())->first()
             ?? User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            // Update google_id and photo if missing
            $user->update([
                'google_id' => $googleUser->getId(),
                'photo'     => $user->photo ?? $googleUser->getAvatar(),
            ]);
        } else {
            // Create new user
            $user = User::create([
                'name'      => $googleUser->getName(),
                'email'     => $googleUser->getEmail(),
                'photo'     => $googleUser->getAvatar(),
                'google_id' => $googleUser->getId(),
                'password'  => null,
                'status'    => 1,
            ]);
        }

        Auth::login($user, remember: true);

        return redirect()->intended('/');
    }
}
