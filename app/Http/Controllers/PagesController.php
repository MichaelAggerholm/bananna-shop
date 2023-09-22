<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        $is_verified = auth()->user() ? auth()->user()->is_verified : false;

        return view('pages.home', ['is_verified' => $is_verified]);
    }

    public function login() {
        return view('pages.login');
    }

    public function register() {
        return view('pages.register');
    }
}
