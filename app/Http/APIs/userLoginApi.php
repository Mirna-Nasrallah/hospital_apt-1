<?php

namespace App\Http\APIs;


use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

class userLoginApi
{

    public function Signup(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                "name" => "required|min:3",
                "email" => "required|email|unique:users",
                "password" => "required|min:6",
            ],
            [
                'digits_between' => "Enter Valid phone number",
            ]
        );

        if ($validator->fails()) {
            return response()->json(["status" => "400", "message" => "failed to pass validation", "data" => ["errors" => $validator->errors()]], 400);
        } else {
            // code .....


            $data['password'] = Hash::make($data['password']);

            $op = User::create($data);

            if ($op) {
                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {

                    $token = auth('sanctum')->user()->createToken("auth_token")->plainTextToken;
                    $message = 'User Created';

                    return response()->json(["status" => " 201", "message" => $message, "data" => ["User" => $op, "token" => $token]], 201);
                }
            } else {
                $message = 'error try again';
                return response()->json(["status" => "500", "message" => $message, 'data' => ['error' => "server error"]], 500);
            }
        }
    }
    public function doLogin(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                "email" => "required|email",
                "password" => "required|min:6",
            ]
        );
        if ($validator->fails()) {

            return response()->json(["status" => "400", "message" => "failed to pass validation", "data" => ["errors" => $validator->errors()]], 400);
        } else {
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                $token = auth('sanctum')->user()->createToken("auth_token")->plainTextToken;
                //auth()->user()->update(['device_token'=>$request->token]);
                $User = auth('sanctum')->user();

                return response()->json(["status" => "202", "message" => "You are logged in", "data" => ["token" => $token, "User" => $User]], 202);
            } else {
                return response()->json(["status" => "403", "message" => "Wrong Email or Password", "data" => ['error' => "Wrong Email or Password"]], 403);
            }
        }
    }
}
