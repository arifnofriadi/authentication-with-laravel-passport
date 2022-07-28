<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user() {
        $user = User::all();
        return view('admin.user.index', compact('user'));
    }

    public function addUser() {
        $role = Role::all();
        return view('admin.user.create', compact('role'));
    }

    public function store(Request $request) {
        $exist = User::where('email', $request->email)->get();

        if (count($exist)>0) {
            return redirect()->back()->withErrors('Your email has already! please contact administrator for more details');
        }

        if ($user = User::create([
            'name'  =>  $request->name,
            'role_id'   => $request->role_id,
            'email' => $request->email,
            'password'  =>  Hash::make($request->password)
        ]));

        if ($user) {
            return redirect('/admin/user')->with('success', 'Successfully created new user');
        } else {
            return redirect()->back()->with('error', 'Cannot creating user');
        }
    }

    public function updateUser($id) {
        $user = User::find($id);
        $role = Role::all();
        return view('admin.user.update', compact('user','role'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        $user->update([
            'name'  => $request->name,
            'role_id'   => $request->role_id,
            'email' => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect('admin/user')->with('successfully', 'Data updated successfully');
        } else {
            return redirect()->back()->with('error', 'Cannot updating data');
        }
    }

    public function destroy($id) {
        $user = User::find($id)->delete();
        if ($user) {
            return redirect()->back()->with('success', 'Data deleted');
        } else {
            return redirect()->back()->with('error', 'Cannot deleting data');
        }
    }
}
