<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Auth;
use JWTAuth;
use App\Project;
use App\Teacher;
use JWTException;

class TeacherController extends Controller
{
	public function Update(Request $request)
	{
			$users = Auth::user();
			$id = $users->id;
			$this->validate($request , [
																			'codes'		  => 'required',		//for security reason, confirm identity with inputing password everytime user update
																			'name'		 => 'required|min:6',
																			'email'       => "required|email|unique:teachers,email,$id",
																			'phone'     => "nullable|numeric|unique:teachers,phone,$id|",
																		]);

				//submit to another table as temporary data
				//send email to first email
				//verify to url
				//if verified,change the data
				//delete the temporary data
			// if(Hash::check($request->password_conf,$users->password)){
				// die('berhasil !');
				$user = Teacher::find($id);

				//security check if the codes right then the output should be true

				if(Hash::check($request->codes,$user->password)){

				$user->update($request->except(['password','codes','password_confirmation']));

				// $user->update([
				// 									'name' => $request->input('name'),
				// 									'email' => $request->input('email') ,
				// 									'phone' => $request->input('nomor'),
				// 								]);

					if(null != $request->input('password') && null != $request->input('password_confirmation')){
						if($request->input('password') == $request->input('password_confirmation')){
							$user->update([
								'password' => bcrypt($request->input('password')),
							]);
						}
					}

					// if($this->validate($request , ['password' => 'required|min:6|confirmed|']))
					// 		{
					// 			$user->update([
					// 									'password' => bcrypt($request->json('password')),
					// 			]);
					// 		}

					return response()->json($user);
			}
			else{
				die('password tidak cocok');
			}
		}
		public function store(Request $request)
		{
				$this->validate($request, [
						'name' 			=> 'required:min:1',
						'username'  => 'required|min:1',
						'email' 			=> 'required|email|unique:users|min:10',
						'password' 	=> 'required|min:5|confirmed',
						'gender'		=> 'required',
						'phone'			=> 'nullable|min:12|numeric',
						'avatar'		=>	'nullable'
				]);

				$user = Teacher::Create($request->all());

				if ($user) {
						$response = [
								'msg' => 'User Created',
								'href' => '/v1/users',
								'method' => 'GET',
						];
						return response()->json($response, 200);
				} else {
						$response = [
								'msg' => 'User Created',
								'href' => '/v1/user',
								'method' => 'GET',
						];
						return response()->json($response, 200);
				}
		}
}
