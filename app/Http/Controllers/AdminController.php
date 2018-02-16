<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use JWTAuth;
use JWTException;

use App\User;
use App\AdminsInfo;

class AdminController extends Controller
{
	public function __construct()
	{
			$this->middleware('jwt.auth');
	}

	public function index(Request $request)
	{
			$que = $request->get('q');
			if (!empty($que)){
					$students = AdminsInfo::where('name', 'like', "%$que%")->get();

			} else {
					$students = AdminsInfo::all()->sortBy('name');
			}
			foreach($students as $student){
					$student->view_students = array(
							'href' => '/api/v1/admins/'.$student->id_admins,
							'method' => 'GET',
					);
			}

			$response = [
					'msg' => 'List of Admins',
					'students' => $students,
					'students_count' => $students->count(),
			];

			return response()->json($response, 200);
	}

	public function show(){
			$users = Auth::user();
			$id = $users->id;
			$student = AdminsInfo::where('id_admins', $id)->get()->first();

			// $student->avatar = '/avatar/'.$student->avatar;

			$response = [
					'profile'=> $student,
					'href' => "/api/v1/user/",
					'method' => "GET",
			];

			return response()->json($response, 200);
	}

	public function store(Request $request)
	{
			$this->validate($request, [
					'username' => 'required:min:1',
					'password' => 'required|min:1',
					'role' => 'required|min:1',
					'name' => 'required',
					'email' => 'required',
					'phone' => 'required|numeric',
			]);

			// $student = User::Create($request->all());
		$student = User::Create($request->only(['username','password','role']));
		if($request->role == 1){
			$student_info = AdminsInfo::Create([
				'name' => $request->name,
				'email' => $request->email,
				'phone'	=> $request->phone,
				'avatar' => $request->avatar,
				'gender' => $request->gender,
				'id_admins' => $student->id,
			]);
		}

			if ($student) {
					$response = [
							'msg' => 'User Berhasil dibuat',
							'href' => '/v1/users',
							'method' => 'GET',
					];
			} else {
					$response = [
							'msg' => 'User gagal dibuat',
							'href' => '/v1/user',
							'method' => 'GET',
					];
			}

			return response()->json($response, 200);
	}

	public function update(Request $request)
	{
		$users = Auth::user();
		$idusers = $users->id;
					$user = AdminsInfo::where('id_admins',$idusers)->get()->first();
					$id = $user->id;

		$this->validate($request , [
							'codes'=> 'required', //for security reason, confirm identity with inputing password everytime user update
							'name' => 'required|min:6',
							'email'=> "required|email|unique:admins_info,email,$id",
							'phone'=> "nullable|numeric|unique:admins_info,phone,$id|",
					]);

					$info = AdminsInfo::where('id_admins',$idusers)->get()->first();
							//security check if the codes right then the output should be true

			if(Hash::check($request->codes,$users->password)){

				if($info->update($request->except(['password','codes','password_confirmation','avatar']))){

						$info->avatar = 'avatar/'.$info->avatar;

					$response = [
									'profile' => $info,
									'msg' => 'User Berhasil diedit',
							'href' => '/v1/users',
							'method' => 'GET',
					];
				}else{
					$response = [
							'msg' => 'User Gagal Diedit',
							'href' => '/v1/users',
							'method' => 'GET',
					];
				}


				if(null != $request->input('password') && null != $request->input('password_confirmation')){
					if($request->input('password') == $request->input('password_confirmation')){
								$user->update([
							'password' => bcrypt($request->input('password')),
						]);
					}
				}

			}else{
				$response = [
						'msg' => 'Password User Salah',
						'href' => '/v1/users',
						'method' => 'GET',
				];
			}

			return response()->json($response);
	}



	// public function destroy($id, Request $request)
	// {
	// 		$student = User::findOrFail($id);
	// 	$info = AdminsInfo::where('id_admins',$id);
	// 		$delete_avatar = Storage::disk('avatar')->delete($info->avatar);
	// 	$info->delete();
	// 		$student->delete();
  //
	// 		$response = [
	// 				'msg' => 'Siswa Berhasil dihapus',
	// 				'href' => '/v1/users',
	// 				'method' =>'GET',
	// 		];
  //
	// 		return response()->json($response);
	// }


}
