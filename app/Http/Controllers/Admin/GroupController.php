<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function indexGroup() {
        $groups = Group::all();
        return view('admin.group.index', compact('groups'));
    }

    public function addGroup() {
        return view('admin.group.create');
    }

    public function store(Request $request) {
        $groups = Group::create([
            'name' => $request->name,
            'city' => $request->city
        ]);

        if($groups) {
            return redirect('admin/group')->with('sucess', 'Success created new group');
        }
    }

    public function delete($id) {
        $group = Group::find($id);
        $group->delete();
        return redirect()->back()->with('success', 'Data deleted');
    }

    public function updateGroup($id) {
        $groups = Group::find($id);
        return view('admin.group.update', compact('groups'));
    }

    public function update(Request $request, $id) {
        $groups = Group::find($id);

        $groups->update([
            'name'  => $request->name,
            'city'  => $request->city
        ]);

        if ($groups) {
            return redirect('admin/group')->with('success', 'Group updated');
        }
    }
}
