<?php

namespace App\Http\Controllers;

use App\Models\Role;
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
        $roles = Role::all();

        return view('admin.pages.users.create', ['roles' => $roles]);
    }

    public function store(Request $request) {
        $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|unique:users|max:255',
            'password'      => 'required|confirmed',
            'role_id'       => 'required|exists:roles,id',
            'company'       => 'required|max:255',
            'address'       => 'required|max:255',
            'city'          => 'required|max:255',
            'zip'           => 'required|digits:4',
            'phone'         => 'required|digits:8',
            'cvr'           => 'required|digits:8',
        ]);

        $user = new User;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = $request->password;
        $user->created_at   = Carbon::now();
        $user->updated_at   = Carbon::now();
        $user->role_id      = $request->role_id;
        $user->company      = $request->company;
        $user->address      = $request->address;
        $user->city         = $request->city;
        $user->zip          = $request->zip;
        $user->phone        = $request->phone;
        $user->cvr          = $request->cvr;
        $user->save();

        return redirect()->route('adminpanel.users')->with('success', 'Brugeren blev oprettet!');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.pages.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|max:255',
            'role_id'       => 'required|exists:roles,id',
            'company'       => 'required|max:255',
            'address'       => 'required|max:255',
            'city'          => 'required|max:255',
            'zip'           => 'required|digits:4',
            'phone'         => 'required|digits:8',
            'cvr'           => 'required|digits:8',
        ]);

        $user = User::findOrFail($id);

        // Gem bruger
        $user->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'updated_at'    => Carbon::now(),
            'role_id'       => $request->role_id,
            'company'       => $request->company,
            'address'       => $request->address,
            'city'          => $request->city,
            'zip'           => $request->zip,
            'phone'         => $request->phone,
            'cvr'           => $request->cvr,
        ]);

        return redirect()->route('adminpanel.users')->with('success', 'Brugeren blev opdateret!');
    }

    public function destroy($id) {
        User::findOrFail($id)->delete();

        return back()->with('success', 'Bruger Slettet!');
    }
}
