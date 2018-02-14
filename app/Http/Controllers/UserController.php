<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// use Storage;

use Auth;
use JWTAuth;
use JWTException;

use App\User;
use App\StudentsInfo;
use App\Mail\ResetPassword;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function index(Request $request)
    {
        $que = $request->get('q');
        if (!empty($que)){
            $students = StudentsInfo::where('name', 'like', "%$que%")->get();

        } else {
            $students = StudentsInfo::all()->sortBy('name');
        }
        foreach($students as $student){
            $student->view_students = array(
                'href' => '/api/v1/user/'.$student->id_students,
                'method' => 'GET',
            );
        }

        $response = [
            'msg' => 'List of Students',
            'students' => $students,
            'students_count' => $students->count(),
        ];

        return response()->json($response, 200);
    }

    public function show(){
        $users = Auth::user();
        $id = $users->id;
        $student = StudentsInfo::where('id_students', $id)->get();

        $response = [
            'profile'=> $student,
            'href' => "/api/v1/user/$id",
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
            'nis' => 'required',
            'gender' => 'required',
        ]);

        $student = User::Create($request->all());
			if($request->role == 3){
				$student_info = StudentsInfo::Create([
					'nis' => $request->nis,
					'name' => $request->name,
					'email' => $request->email,
					'bio'	=>	$request->bio,
					'phone'	=> $request->phone,
					'avatar' => $request->avatar,
					'id_class' => $request->class,
					'id_major' => $request->major,
					'gender' => $request->gender,
					'id_students' => $student->id,
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
			$id = $users->id;
			$this->validate($request , [
                'codes'=> 'required', //for security reason, confirm identity with inputing password everytime user update
                'name' => 'required|min:6',
                'email'=> "required|email|unique:students_info,email,$id",
                'phone'=> "nullable|numeric|unique:students_info,phone,$id|",
            ]);

				$user = User::find($id);
				$info = StudentsInfo::where('id_students',$id);
                //security check if the codes right then the output should be true

				if(Hash::check($request->codes,$user->password)){

					if($info->update($request->except(['password','codes','password_confirmation','avatar']))){
						$response = [
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

				// if(null != $request->file('avatar')){
				// 	$file=$request->file('avatar');
				// 	$filename = $users->username . '-' . time() . '.png';
				// 	if($file){
        //                 Storage::disk('avatar')->put($filename,File::get($file));
				// 		$info->update([
				// 			'avatar'	=>	$filename,
				// 		]);
				// 	}
				// }

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
				return response()->json($user);
    }

	 public function update_avatar(Request $request)
	 {
		 $users = Auth::user();
		 $id = $users->id;
		 $user = User::find($id);
		 $info = StudentsInfo::where('id_students',$id);

		 if($request->hasFile('avatar')){
		 	$file=$request->file('avatar');
		 	$filename = $users->username . '-' . time() . '.' . $file->getClientOriginalExtension();
		 	if($file){

                $exist = Storage::disk('avatar')->exists($user->avatar);
		 	    if(isset($info->avatar) && $exist){
                    $delete_avatar = Storage::disk('avatar')->delete($user->avatar);
                }

		 		if(Storage::disk('avatar')->put($filename,File::get($file))){
					if($info->update([
						'avatar' =>	$filename,
					])){
						$response = [
							'msg' => 'Item Telah Diupdate',
							'href' => '/v1/users',
							'method' =>'GET',
						];
					}else{
						$response = [
							'msg' => 'Item Gagal Diupdate database',
							'href' => '/v1/users',
							'method' =>'GET',
						];
					}
				}else{
					$response = [
						'msg' => 'Item Gagal Diupdate pindah file',
						'href' => '/v1/users',
						'method' =>'GET',
					];
				}
		 	}else{
				$response = [
					'msg' => 'Item Gagal Diupdate null',
					'href' => '/v1/users',
					'method' =>'GET',
				];
			}
		}else{
			$response = [
				'msg' => 'Item Gagal Diupdate null 1',
				'href' => '/v1/users',
				'method' =>'GET',
			];
		}
		 return response()->json($response);
	 }


    public function destroy($id, Request $request)
    {
        $student = User::findOrFail($id);
		  $info = StudentsInfo::where('id_students',$id);
        $delete_avatar = Storage::disk('avatar')->delete($student->avatar);
        $student->delete();
		  $info->delete();

        $response = [
            'msg' => 'Siswa Berhasil dihapus',
            'href' => '/v1/users',
            'method' =>'GET',
        ];

        return response()->json($response);
    }


}
