<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();

        return view('admin.pages.users.index', ['users' => $users]);
    }

    public function create() {
        return view('admin.pages.users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|unique:users|max:255',
            'password'      => 'required|confirmed',
            'is_verified'   => 'required|boolean',
            'is_admin'      => 'required|boolean',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->is_verified = $request->is_verified;
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('adminpanel.users')->with('success', 'Brugeren blev oprettet!');
    }

    public function edit($id) {
        $user = User::findOrFail($id);

        return view('admin.pages.users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|max:255',
            'is_verified'   => 'required',
            'is_admin'      => 'required',
        ]);

        $user = User::findOrFail($id);

        // Gem bruger
        $user->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'updated_at'    => Carbon::now(),
            'is_verified'   => $request->is_verified,
            'is_admin'      => $request->is_admin,
        ]);

        return redirect()->route('adminpanel.users')->with('success', 'Brugeren blev opdateret!');
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();

        return back()->with('success', 'Bruger Slettet!');
    }
}
