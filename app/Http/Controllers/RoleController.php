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
}
