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

    public function index()
    {
        $this->middleware('jwt.auth');
        $siswa = User::all()->sortBy('name');
        return response()->json($siswa);
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id)->delete();
        if($user === true ){

            $response = [
                'status' => $user,
                'msg' => 'Siswa Berhasil dihapus',
            ];

            return response()->json($response, 200);

        } else {

            $response = [
                'status' => $user,
                'msg' => 'Siswa Gagal dihapus',
            ];

            return response()->json($response, 500);
         }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        if(!empty($user)) {
            $response = [
                'msg' => 'edit siswa berhasil',
            ];

            return response()->json($response);
        }

    }
}
