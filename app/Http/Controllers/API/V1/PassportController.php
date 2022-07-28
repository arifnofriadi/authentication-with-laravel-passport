<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PassportController extends Controller
{
    public function register(Request $request) {
        $this->validate($request, [
            'name'  =>  'required|min:4',
            'email' =>  'required|email',
            'password'  =>  'required|min:6',
            'role_id'   =>  'required|max:1',
        ]);

        $user = User::create([
            'name'  =>  $request->name,
            'email' =>  $request->email,
            'password'  =>  Hash::make($request->password),
            'role_id'   => $request->role_id
        ]);

        $token = $user->createToken('LaravelAuthApp')->accessToken;

        return response()->json(['token'    =>  $token], 200);
    }

    public function login(Request $request) {
       $data = [
        'email' =>  $request->email,
        'password'  =>  $request->password
       ];

       if (auth()->attempt($data)) {
        $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
        return response()->json(['token'    =>  $token], 200);
       } else {
        return response()->json(['error'    =>  'Unauthorised'], 401);
       }
    }

    public function user() {
        $user = User::all();
        return response()->json([
            'success'   =>  true,
            'data'  =>  $user
        ]);
    }

    public function show($id) {
        $user = User::find($id);
        return response()->json([
            'success'   =>  true,
            'data'      => $user
        ]);
    }
}
