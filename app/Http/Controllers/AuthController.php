<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
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

        if (Auth::attempt($credentials) && Auth::user()->role_id === 3) {
            return view('admin.pages.dashboard')->with('success', 'Du er succesfuldt logget ind som admin!');
        } elseif (Auth::attempt($credentials) && Auth::user()->role_id === 2) {
            return redirect('/')->with('success', 'Du er succesfuldt logget ind som B2B bruger!');
        } elseif (Auth::attempt($credentials) && Auth::user()->role_id === 1) {
            return redirect('/')->with('warning', 'Du er succesfuldt logget, men din bruger er ikke B2b godkendt endnu!');
        }

        return redirect('/')->with('warning', 'Ugyldige login oplysninger!');
    }

    public function registerUser(Request $request) {
        $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|unique:users|max:255',
            'password'      => 'required|confirmed',
            'company'       => 'required|max:255',
            'address'       => 'required|max:255',
            'city'          => 'required|max:255',
            'zip'           => 'required|digits:4',
            'phone'         => 'required|digits:8',
            'cvr'           => 'required|digits:8',
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'company'   => $request->company,
            'address'   => $request->address,
            'city'      => $request->city,
            'zip'       => $request->zip,
            'phone'     => $request->phone,
            'cvr'       => $request->cvr,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);

        return redirect('/')->with('success', 'Du er succesfuldt registreret, afvent B2B godkendelse af admin!');
    }

    public function logout() {
        Auth::logout();

        return redirect('/')->with('success', 'Du er succesfuldt logget ud!');
    }
}
