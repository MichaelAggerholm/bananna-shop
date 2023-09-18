<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function validateLogin(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials) && Auth::user()->is_admin) {
            return view('admin.pages.dashboard')->with('success', 'Du er succesfuldt logget ind som admin!');
        } elseif (Auth::attempt($credentials) && Auth::user()->is_verified) {
            return redirect('/')->with('success', 'Du er succesfuldt logget ind som B2B bruger!');
        } elseif (Auth::attempt($credentials) && !Auth::user()->is_verified) {
            return back()->withInput()->withErrors(['email' => 'Din B2B bruger er ikke verificeret!']);
        }

        return back()->withInput()->withErrors(['email' => 'Ugyldige login oplysninger!']);
    }

    public function registerUser(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Du er succesfuldt registreret, afvent B2B godkendelse af admin!');
    }

    public function logout() {
        Auth::logout();

        return back()->with('success', 'Du er succesfuldt logget ud!');
    }
}
