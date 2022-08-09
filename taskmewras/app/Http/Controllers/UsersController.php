<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UsersController extends Controller
{
    /// UsersController  include 
    // 1-login function 
    // 2-register function 


    function login(Request $request)
    {

        // validation 
        $validator = Validator::make(
            $request->all(),
            [
                'user_email' => 'email|required',
                'password' => 'required|min:8',
            ]
        );

        //return fail login from validation 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // call user from email 
        $user = Users::where('user_email', request('user_email'))->first();


        // check out about email and password
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'errors' => ['Email or Password is incorrect']
            ]);
        }
        // success login 
        
        return response($user, 201);
    }







    function register(Request $request)
    {


         // validatio
        $validator = Validator::make(
            $request->all(),
            [
                'user_name' => 'required',
                'user_email' => 'required|unique:users,user_email',
                'password' => 'required|min:8',
            ],

        );

        //return fail login from validation 
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        // add new user 
        $user = new Users();
        $user->user_name = $request->user_name;
        $user->user_email = $request->user_email;
        $user->password = Hash::make($request->password);
        $user->save();

        // success register 
        return response($user, 201);
    }
}
