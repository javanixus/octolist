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
			$user = Auth::user();


			return Auth::user()->name;
		}

		public function CreateProject(Request $request)
		{
				$this->validate($request,[
					'project_title' 			=> 'required',
					'project_deadline' 	=> 'required',
					'id_students'				=> 'required',
				]);
		}
}
