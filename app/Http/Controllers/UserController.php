<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        $admins = DB::table('admins')->get();
        return view('users.index', compact('users', 'admins'));
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|string|in:user,admin',
        ]);

        if ($request->role == 'admin') {
            $user = DB::table('users')->where('id', $id)->first();
            if ($user) {
                DB::table('admins')->insert([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                DB::table('users')->where('id', $id)->delete();
            }
        } elseif ($request->role == 'user') {
            $admin = DB::table('admins')->where('id', $id)->first();
            if ($admin) {
                DB::table('users')->insert([
                    'name' => $admin->name,
                    'email' => $admin->email,
                    'password' => $admin->password,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                DB::table('admins')->where('id', $id)->delete();
            }
        }

        return redirect()->back()->with('success', 'Role updated successfully.');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin',
        ]);

        if ($request->role == 'admin') {
            DB::table('admins')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $admin = DB::table('admins')->where('id', $id)->first();

        if ($user) {
            $role = 'user';
        } elseif ($admin) {
            $role = 'admin';
        } else {
            abort(404, 'User not found');
        }

        return view('users.edit', compact('user', 'admin', 'role'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id . '|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:user,admin',
        ]);

        if ($request->role == 'admin') {
            $user = DB::table('users')->where('id', $id)->first();
            if ($user) {
                DB::table('admins')->insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $user->password,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                DB::table('users')->where('id', $id)->delete();
            } else {
                DB::table('admins')->where('id', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : DB::raw('password'),
                    'updated_at' => now(),
                ]);
            }
        } else {
            $admin = DB::table('admins')->where('id', $id)->first();
            if ($admin) {
                DB::table('users')->insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : $admin->password,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                DB::table('admins')->where('id', $id)->delete();
            } else {
                DB::table('users')->where('id', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password ? Hash::make($request->password) : DB::raw('password'),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}
