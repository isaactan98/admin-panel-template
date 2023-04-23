<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $roles = [
        '1' => 'Super Admin',
        '2' => 'Admin',
        '3' => 'Staff',
        '4' => 'Customer'
    ];

    public $sub_role = [
        '2' => 'Admin',
        '3' => 'Staff',
        '4' => 'Customer'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function listing()
    {
        // $userListing = User::all();
        $userListing = User::paginate(10);
        return view('user.listing', compact('userListing'));
    }

    public function add(Request $request)
    {
        $title = "Add";
        $error = [];
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'role' => 'required'
            ]);

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->password = bcrypt("12341234");
            $user->save();

            return redirect()->route('user.listing')->with('success', 'User added successfully!');
        }

        return view('user.form', [
            'title' => $title,
            'roles' => auth()->user()->role == 1 ? $this->roles : $this->sub_role,
            'submit' => route('user.add'),
            'error' => $error
        ]);
    }

    public function edit(Request $request, $id)
    {
        $title = "Edit";
        $user = User::find($id);
        $errors = null;

        if (!$user) {
            return redirect()->route('user.listing')->with('error', 'User not found!');
        }

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'role' => 'required'
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->save();

            return redirect()->route('user.listing')->with('success', 'User updated successfully!');
        }

        return view('user.form', [
            'user' => $user,
            'title' => $title,
            'roles' => auth()->user()->role == 1 ? $this->roles : $this->sub_role,
            'submit' => route('user.edit', ['id' => $id]),
            'errors' => $errors
        ]);
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        if (!$user) {
            return redirect()->route('user.listing')->with('error', 'User not found!');
        }

        $user->delete();
        return redirect()->route('user.listing')->with('success', 'User deleted successfully!');
    }
}
