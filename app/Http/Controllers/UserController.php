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

    public function index()
    {
        $students = StudentsInfo::all()->sortBy('name');

        foreach($students as $student){
            $student->view_students = array(
                'href' => '/api/v1/user/'.$student->id_students,
                'method' => 'GET',
            );
        }

        $response = [
            'students' => $students,
            'students_count' => $students->count(),
        ];

        return response()->json($response, 200);
    }

    public function show(){
        $student = Auth::user();
        $student = StudentsInfo::where('id_students',  $student->id)->get()->first();



        if ($student){

            $student->avatar = '/avatar/'.$student->avatar;

            $response = [
                'profile'=> $student,
                'href' => "/api/v1/user/",
            ];

            return response()->json($response, 200);
        } else

            $response = [
                'msg'=> 'not found',
                'href' => "/404",
            ];

            return response()->json($response,404);
    }

    public function store(Request $request)
    {
        $admin = Auth::user();
        if ($admin->role == 1){

            $this->validate($request, [
                'username' => 'required:min:1',
                'password' => 'required|min:1',
                'role' => 'required|min:1',
                'name' => 'required',
                'email' => 'required',
                'nis' => 'required',
                'gender' => 'required',
            ]);

            // $student = User::Create($request->all());
            $student = User::Create($request->only(['username', 'password', 'role']));
            if ($request->role == 3) {
                $student_info = StudentsInfo::Create([
                    'nis' => $request->nis,
                    'name' => $request->name,
                    'email' => $request->email,
                    'bio' => $request->bio,
                    'phone' => $request->phone,
                    'avatar' => $request->avatar,
                    'id_class' => $request->class,
                    'id_major' => $request->major,
                    'gender' => $request->gender,
                    'id_students' => $student->id,
                ]);
            }

            if ($student) {
                $response = [
                    'msg' => 'user berhasil dibuat',
                    'href' => '/v1/users',
                    'method' => 'GET',
                ];
            } else {
                $response = [
                    'msg' => 'user gagal dibuat',
                    'href' => '/v1/user',
                    'method' => 'GET',
                ];
            }

            return response()->json($response, 200);

        } else {

            return  response()->json('api not allowed', 403);
        }
    }

    public function update(Request $request)
    {
			$users = Auth::user();
			$idusers = $users->id;
            $user = StudentsInfo::where('id_students',$idusers)->get()->first();
            $id = $user->id;

			$this->validate($request , [
                'codes'=> 'required', //for security reason, confirm identity with inputing password everytime user update
                'name' => 'required|min:6',
                'email'=> "required|email|unique:students_info,email,$id",
                'phone'=> "nullable|numeric|unique:students_info,phone,$id|",
            ]);

            $info = StudentsInfo::where('id_students',$idusers)->get()->first();
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

	 public function update_avatar(Request $request)
	 {
		 $users = Auth::user();
		 $id = $users->id;
		 $user = User::find($id);
		 $info = StudentsInfo::where('id_students',$id)->get()->first();

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

	public function profile($id){
		// $users = Auth::user();
        // $id = $users->id;
        $student = StudentsInfo::where('id_students', $id)->get()->first();

        $student->avatar = '/avatar/'.$student->avatar;

        $response = [
            'profile'=> $student,
            'href' => "/api/v1/user/",
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

    public function search(Request $request)
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
        ];

        return response()->json($response, 200);
    }

		public function start(Request $request)
	  {
	      $id = Auth::user()->id;
			$user = StudentsInfo::where('id_students',$id);
			$ids = $user->first()->id;
	      $this->validate($request , [
              'email' => "required|email|unique:students_info,email,$ids",
              'password' => "required|confirmed",
              'codes' => 'required',
            ]);

	      // dd($request);
				$pass = User::find($id);
				if(Hash::check($request->codes,$pass->password))
				{
					$password = bcrypt($request->password);
					$update = $user->update(['email' => $request->email ,
																'new' => 1]);
					if($update)
					{
						// echo $password;
						$update = $pass->update([
							'password' => $password,
						]);

						if($update)
						{
							$response = [
								'pass' => $password,
								'aa' => $password,
								'pass1' => $request->password,
								'msg' => 'welcome to Octolist',
							];
						}else{
							$response = [
								'msg' => 'password error'
							];

						}
					}else{
						$response = [
							'msg' => 'error email input',
						];
					}
				}else{
					// die(bcrypt($request->password));
					$response = [
						'msg' => 'password lama salah',
					];
				}

	      return response()->json($response,200);

	  }


}
