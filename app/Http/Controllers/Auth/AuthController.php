<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{



    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email',
            'mobile_number'  => 'required|string|max:20|unique:users,mobile_number',
            'password'       => 'required|string|min:6',
            'terms_accepted' => 'required|accepted',
        ], [
            'terms_accepted.required' => 'Please accept Terms & Conditions.',
            'terms_accepted.accepted' => 'Please accept Terms & Conditions.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'signup')
                ->withInput()
                ->with('open_modal', 'signup');
        }
        $user = User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'mobile_number'  => $request->mobile_number,
            'password'       => Hash::make($request->password),
            'terms_accepted' => true,
        ]);

        // profile bhi saath me create ho jayega
        Profile::create(['user_id' => $user->id]);

        Auth::login($user);

         return redirect()->route('home')->with('success', 'Account created successfully! Welcome ' . $user->name);
    }


    // Login
       public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login'    => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'login')
                ->withInput()
                ->with('open_modal', 'login');
        }

        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile_number';

        if (!Auth::attempt([$field => $request->login, 'password' => $request->password], true)) {
            return back()
                ->withErrors(['login' => 'Invalid email/mobile or password.'], 'login')
                ->withInput()
                ->with('open_modal', 'login');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'))->with('success', 'Welcome back, ' . Auth::user()->name . '!');
    }

   public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }

    // Google OAuth
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::where('google_id', $googleUser->id)
            ->orWhere('email', $googleUser->email)
            ->first();

        if (!$user) {
            $user = User::create([
                'name'      => $googleUser->name,
                'email'     => $googleUser->email,
                'google_id' => $googleUser->id,
                'avatar'    => $googleUser->avatar,
                'password'  => Hash::make(uniqid()),
                'terms_accepted' => true,
            ]);
            Profile::create(['user_id' => $user->id]);
        } elseif (!$user->google_id) {
            $user->update(['google_id' => $googleUser->id, 'avatar' => $googleUser->avatar]);
        }

        Auth::login($user, true);

        return redirect()->intended('/');
    }

        public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'forgot')
                ->withInput()
                ->with('open_modal', 'forgot');
        }

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Password reset link sent to your email.');
        }

        return back()
            ->withErrors(['email' => 'Unable to send reset link. Try again.'], 'forgot')
            ->with('open_modal', 'forgot');
    }
}
