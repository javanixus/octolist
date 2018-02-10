<?php

namespace App\Http\Controllers;

Use App\Http\Controllers\TokenSaver;
use Illuminate\Http\Request;
use JWTException;
use App\User;
use JWTAuth;

class AuthController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required:min:1',
            'username' => 'required|min:1',
            'email' => 'required|email|unique:users|min:10',
            'password' => 'required|min:5',
        ]);

        $nis = $request->input('nis');
        $bio = $request->input('bio');
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');


        $user = New User([
            'name' => $name,
            'nis' => $nis,
            'bio' => $bio,
            'username' => $username,
            'email' => $email,
            'password' => bcrypt($password),
        ]);


        if ($user->save()){

            $credentials = [
                'username' => $username,
                'password' => $password,
            ];

            $token = NULL;

            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['msg' => 'invalid_credentials',
                    ], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['msg' => 'could_not_create_token',
                ], 500);
            }

            $user->signin = [
                'href'=> 'api/v1/user/signin',
                'method'=> 'POST',
                'params'=> 'username, password',
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

        return response()->json($response, 200);

    }

    public function signin(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        if ($user = User::where('username', $username)->first()){
            $credentials = [
                'username'=> $username,
                'password'=> $password,
            ];

            $token = NULL;

            try {
                if (! $token = JWTAuth::attempt($credentials)) {
                    return response()->json(['msg' => 'Username atau Password Salah', // Jika salah password akan mengembalikan invalid credentials
                    ], 201);
                }
            } catch (JWTException $e) {
                return response()->json(['msg' => 'could_not_create_token',
                ], 500);
            }

            $user->avatar = asset($user->avatar);


            $response = [
//                'href' =>  '/user/profile',
                'msg' => '',
                'passed' => true,
                'user' => $user,
                'token' => $token,
                'redirect' => route('dashboard'),
            ];

				JWTAuth::setToken($token);
				// TokenSaver::$token = $token;
//				return ['redirect' => route('dashboard'),'data' => $response];
				// return redirect('/api/v1/dashboard')
				// 													->withHeaders([
				// 														'Content-Type' => 'application/json',
				// 														'Accept' => 'application/json',
				// 														'Authorization' => 'Bearer '.$token,
				// 													]);
             return response()->json($response, 201);
						// 							 ->withHeaders([
						// 								 'Content-Type' 	=> 'application/json',
						// 								 'Accept'					=> 'application/json',
						// 								 'Authorization'	=> 'Bearer'.$token;
						// 							 ]);
        }

        $response = [
            'msg' =>  'Akun Tidak Terdaftar', // Jika Username tidak ada maka mengembalikan error ini
        ];

        return response()->json($response, 201);
    }
}
