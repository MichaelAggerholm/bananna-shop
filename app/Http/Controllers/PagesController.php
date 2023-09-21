<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        $is_verified = auth()->user() ? auth()->user()->is_verified : false;

        return view('pages.home', ['is_verified' => $is_verified, 'is_logged_in' => false]);
    }

    public function login() {
        if(auth()->user()) {
            if(auth()->user()->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        }
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }
}
