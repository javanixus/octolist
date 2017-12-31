<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $siswa = User::all()->sortBy('name');
        return response()->json($siswa);
    }
=======
    public function home(Request $request)
		{
				return view('welcome');
				// return $request->user();
		}
>>>>>>> 9be077f0d142e082358f3511a19b62d3c74656ab
}
