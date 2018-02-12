<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// use Storage;

use Auth;
use JWTAuth;
use JWTException;

use App\User;
use App\StudentsInfo;

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
            $students = User::Where('name', 'like', "%$que%")
                        ->OrWhere(' username', 'like', '%$que%')->get();
        } else {
            $students = User::all()->sortBy('name');
        }
        foreach($students as $student){
            $student->view_students = array(
                'href' => '/api/v1/user/'.$student->id,
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

    public function show($id){
        $student = User::findOrFail($id);

        $response = [
            'msg' => "User Profile",
            'data' => $student,
            'href' => "/api/v1/users",
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

        $student_info = StudentsInfo::Create([
            'name' => $request->name,
            'email' => $request->email,
            'nis' => $request->nis,
            'gender' => $request->gender,
            'id_students' => $student->id,
        ]);

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

					$info->update($request->except(['password','codes','password_confirmation','avatar']));

				if(null != $request->file('avatar')){
					$file=$request->file('avatar');
					$filename = $users->username . '-' . time() . '.png';
					if($file){
                        Storage::disk('avatar')->put($filename,File::get($file));
						$info->update([
							'avatar'	=>	$filename,
						]);
					}
				}

					if(null != $request->input('password') && null != $request->input('password_confirmation')){
						if($request->input('password') == $request->input('password_confirmation')){
						    	$user->update([
								'password' => bcrypt($request->input('password')),
							]);
						}
					}

					return response()->json($user);
            }
    }

	 public function update_avatar(Request $request)
	 {
		 $users = Auth::user();
		 $id = $users->id;
		 $user = User::find($id);
		 $info = StudentsINfo::where('id_students',$id);

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
							'msg' => 'Item Gagal Diupdate',
							'href' => '/v1/users',
							'method' =>'GET',
						];
					}
				}else{
					$response = [
						'msg' => 'Item Gagal Diupdate',
						'href' => '/v1/users',
						'method' =>'GET',
					];
				}
		 	}else{
				$response = [
					'msg' => 'Item Gagal Diupdate',
					'href' => '/v1/users',
					'method' =>'GET',
				];
			}
		}else{
			$response = [
				'msg' => 'Item Gagal Diupdate',
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
