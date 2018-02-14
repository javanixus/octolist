<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use Auth;
use JWTAuth;
use JWTException;

use App\User;
use App\Project;
use App\TeachersInfo;

class TeacherController extends Controller
{

	public function update(Request $request)
	{
		$users = Auth::user();
		$idusers = $users->id;
					$user = TeachersInfo::where('id_teachers',$idusers)->get()->first();
					$id = $user->id;

		$this->validate($request , [
							'codes'=> 'required', //for security reason, confirm identity with inputing password everytime user update
							'name' => 'required|min:6',
							'email'=> "required|email|unique:students_info,email,$id",
							'phone'=> "nullable|numeric|unique:students_info,phone,$id|",
					]);

			$info = TeachersInfo::where('id_teachers',$idusers);
							//security check if the codes right then the output should be true

			if(Hash::check($request->codes,$user->password)){

				if($info->update($request->except(['password','codes','password_confirmation','avatar']))){
					$response = [
							'msg' => 'User Berhasil diedit',
							'href' => '/v1/teacher',
							'method' => 'GET',
					];
				}else{
					$response = [
							'msg' => 'User Gagal Diedit',
							'href' => '/v1/teacher',
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
						'href' => '/v1/teacher',
						'method' => 'GET',
				];
			}

			return response()->json($user);
	}

 public function update_avatar(Request $request)
 {
	 $users = Auth::user();
	 $id = $users->id;
	 $user = User::find($id);
	 $info = TeachersInfo::where('id_teachers',$id)->get()->first();

	 if($request->hasFile('avatar')){
		$file=$request->file('avatar');
		$filename = $users->username . '-' . time() . '.' . $file->getClientOriginalExtension();
		if($file){

							$exist = Storage::disk('avatar')->exists($info->avatar);
				if(isset($info->avatar) && $exist){
									$delete_avatar = Storage::disk('avatar')->delete($info->avatar);
							}

			if(Storage::disk('avatar')->put($filename,File::get($file))){
				if($info->update([
					'avatar' =>	$filename,
				])){
					$response = [
						'msg' => 'Item Telah Diupdate',
						'href' => '/v1/teacher',
						'method' =>'GET',
					];
				}else{
					$response = [
						'msg' => 'Item Gagal Diupdate',
						'href' => '/v1/teacher',
						'method' =>'GET',
					];
				}
			}else{
				$response = [
					'msg' => 'Item Gagal Diupdate',
					'href' => '/v1/teacher',
					'method' =>'GET',
				];
			}
		}else{
			$response = [
				'msg' => 'Item Gagal Diupdate null',
				'href' => '/v1/teacher',
				'method' =>'GET',
			];
		}
	}else{
		$response = [
			'msg' => 'Item Gagal Diupdate null 1',
			'href' => '/v1/teacher',
			'method' =>'GET',
		];
	}
	 return response()->json($response);
 }


		public function store(Request $request)
		{
				$this->validate($request, [
						'name' 			=> 'required:min:1',
						'username'  => 'required|min:1',
						'email' 			=> 'required|email|min:10',
						'password' 	=> 'required|min:5|confirmed',
						'gender'		=> 'required',
						'phone'			=> 'nullable|min:12|numeric',
				]);

				$student = User::Create($request->only(['username','password','role']));

				if($request->role == 2){
					$student_info = TeachersInfo::Create([
						'nip' => $request->nip,
						'name' => $request->name,
						'email' => $request->email,
						'bio'	=>	$request->bio,
						'phone'	=> $request->phone,
						'avatar' => $request->avatar,
						'gender' => $request->gender,
						'id_teachers' => $student->id,
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

		public function show($id)
		{
			$user = User::findOrFail($id);
			$id = $user->id;
			$user = TeachersInfo::where('id_teachers',$id)->get()->first();

			$response = [
					'msg' => "Teacher Profile",
					'data' => $user,
					'href' => "v1/user",
					'method' => "GET",
			];

			return response()->json($response, 200);

		}
		public function destroy($id, Request $request)
		{
				$student = User::findOrFail($id);
			$info = StudentsInfo::where('id_students',$id);
				$delete_avatar = Storage::disk('avatar')->delete($info->avatar);
			$info->delete();
				$student->delete();

				$response = [
						'msg' => 'Siswa Berhasil dihapus',
						'href' => '/v1/users',
						'method' =>'GET',
				];

				return response()->json($response);
		}
}
