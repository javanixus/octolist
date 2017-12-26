<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestUser;

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
}
