<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('admin.pages.roles.index', ['roles' => $roles]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:roles|max:255'
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->save();

        return redirect()->back()->with('success', 'Rolle oprettet!');
    }

    public function destroy($id) {
        Role::findOrFail($id)->delete();

        return back()->with('success', 'Rolle slettet!');
    }
}
