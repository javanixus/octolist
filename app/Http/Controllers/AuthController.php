<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use JWTException;

class AuthController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|min:1',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = New User([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);


        if ($user->save()){

            $credentials = [
                'email' => $username,
                'password' => $password,
            ];

            $token = NULL;

            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['error' => 'invalid_credentials',
                    ], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token',
                ], 500);
            }

            $user->signin = [
                'href'=> 'api/v1/user/signin',
                'method'=> 'POST',
                'params'=> 'email, password',
            ];
            $response = [
                'msg' => 'User Created',
                'user' => $user,
                'token' => $token,
            ];
            return response()->json($response, 201);
        }

        $response = [
            'msg' => 'Error While Creating User',
        ];

        return response()->json($response, 404);

    }

    public function signin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        return $request->email .' and '. $request->password;
    }
}
