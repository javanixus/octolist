<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function home(Request $request)
		{
				return view('welcome');
				// return $request->user();
		}
}
