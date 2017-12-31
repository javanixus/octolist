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

    public function update(Request $request)
    {
        return response()->json($request);
    }

    public function home(){
        return 'haloo';
    }
}
