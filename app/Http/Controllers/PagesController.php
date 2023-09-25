<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home() {
        $is_verified = Auth::user() && (Auth::user()->role_id === 2 || Auth::user()->role_id === 3);

        return view('pages.home', ['is_verified' => $is_verified]);
    }

    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }
}
