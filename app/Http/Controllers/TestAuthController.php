<?php

namespace App\Http\Controllers;

Use App\Http\Controllers\TokenSaver;;
use Illuminate\Http\Request;
use JWTException;
use App\TestUser;
use App\User;
use JWTAuth;
use Auth;

class TestAuthController extends Controller
{
    public function signup(Request $request){
			$this->validate($request,[
				'username' => 'required',
				'password' => 'required',
			]);
			TestUser::create([
				'username' => $request->json('username'),
				'password' => bcrypt($request->json('password'))
			]);
			echo $request->json('username');
		}

		public function EditProfile(){
			return Auth::user()->name;
		}
}
