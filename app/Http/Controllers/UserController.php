<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
                        ->OrWhere('username', 'like', '%$que%')->get();
        } else {
            $students = User::all()->sortBy('name');
        }
        foreach($students as $student){
            $student->view_students = array(
                'href' => 'api/v1/user/'.$student->id,
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
            'href' => "api/v1/users",
            'method' => "GET",
        ];

        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required:min:1',
            'nis' => 'required:min:1',
            'username' => 'required|min:1',
            'email' => 'required|email|unique:users|min:10',
            'password' => 'required|min:5',
            'phone' => 'unique:users|min:12|max:15',
        ]);

        $student = User::Create($request->all());

        if ($student) {
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

    public function update(Request $request, $id)
    {
        $student = User::findOrFail($id);
        $student->update($request->all());

        return response()->json();
    }

    public function destroy($id, Request $request)
    {
        $student = User::findOrFail($id);
        $student->delete();

        $response = [
            'msg' => 'Siswa Berhasil dihapus',
            'href' => '/v1/users',
            'method' =>'GET',
        ];

        return response()->json($response);
    }


}
