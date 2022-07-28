<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\MemberImport;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Group;
use Maatwebsite\Excel\Facades\Excel;
use File;

class MemberController extends Controller
{
    public function indexMember() {
        $member = Member::all();
        return view('admin.member.index', compact('member'));
    }

    public function importMember() {
        return view('admin.member.form_import');
    }

    public function addMember() {
        $groups = Group::all();
        return view('admin.member.create', compact('groups'));
    }

    public function store(Request $request) {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                try {
                    $path = '/profile-picture/';
                    $file = $request->file('image');
                    $name = $path.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $request->file('image')->move(public_path($path), $path.$name);

                    $member = Member::create([
                        'image' => $name,
                        'name'  => $request->name,
                        'group_id'  => $request->group_id,
                        'email' => $request->email,
                        'phone_number'  => $request->phone_number,
                        'address'   => $request->address,
                    ]);
                    return redirect('admin/member')->with('success', 'Successfully added new member');
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }

                return redirect()->back()->with('error', 'Something else');
            }
        }
    }

    public function updateMember($id) {
        $member = Member::find($id);
        $groups = Group::all();
        return view('admin.member.update', compact('member','groups'));
    }

    public function update(Request $request, $id) {
        $member = Member::find($id);

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                try {
                    $path = '/profile-picture/';
                    $file = $request->file('image');
                    $name = $path.rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $request->file('image')->move(public_path($path), $path.$name);

                    $member = $member->update([
                        'image' => $name,
                        'name'  => $request->name,
                        'group_id'  => $request->group_id,
                        'email' => $request->email,
                        'phone_number'  => $request->phone_number,
                        'address'   => $request->address,
                    ]);
                    return redirect('admin/member')->with('success', 'Successfully update member');
                } catch (Illuminate\Filesystem\FileNotFoundException $e) {

                }

                return redirect()->back()->with('error', 'Something else');
            }
        }
    }

    public function destroy($id) {
        $member = Member::findOrFail($id);
        $image_path = $member->image;

        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }

        if($member->delete()) {
            return redirect()->back()->with('success', 'Member deleted');
        } else {
            return redirect()->back()->with('error', 'Cannot deleting');
        }
    }

    public function import() {
        Excel::import(new MemberImport, request()->file('file'));
        return redirect('admin/member')->with('success', 'Data imported successfully');
    }
}
