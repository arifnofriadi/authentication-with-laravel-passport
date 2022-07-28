<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        /**Validate the data using validation rules
        */
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role_id'   =>  'required',
        ]);

        /**Check the validation becomes fails or not
        */
        if ($validator->fails()) {
            /**Return error message
            */
            return response()->json([ 'error'=> $validator->errors() ]);
        }

        /**Store all values of the fields
        */
        $newuser = $request->all();

            /**Create an encrypted password using the hash
        */
        $newuser['password'] = Hash::make($newuser['password']);

        /**Insert a new user in the table
        */
        $user = User::create($newuser);

            /**Create an access token for the user
        */
        $success['token'] = $user->createToken('AppName')->accessToken;
        /**Return success message with token value
        */
        return response()->json(['success'=>$success], 200);
    }
}
