<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function listing()
    {
        $roles = Role::all();
        return view('role.listing', [
            'roles' => $roles
        ]);
    }

    public function add(Request $request)
    {
        $title = "Add";
        $error = [];
        if ($request->isMethod('post')) {
            $request->validate([
                'role_name' => 'required'
            ]);

            $role = new Role();
            $role->role_name = $request->role_name;
            $role->save();

            return redirect()->route('roles.listing')->with('success', 'Role added successfully!');
        }

        return view('role.form', [
            'title' => $title,
            'submit' => route('roles.add'),
            'error' => $error
        ]);
    }

    public function edit(Request $request, $id)
    {
        $title = "Edit";
        $error = [];
        $role = Role::find($id);
        if (!$role) {
            return redirect()->route('rols.listing')->with('error', 'Role not found!');
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'role_name' => 'required'
            ]);

            $role->role_name = $request->role_name;
            $role->save();

            return redirect()->route('roles.listing')->with('success', 'Role updated successfully!');
        }

        return view('role.form', [
            'title' => $title,
            'role' => $role,
            'submit' => route('roles.edit', $id),
            'error' => $error
        ]);
    }
}
