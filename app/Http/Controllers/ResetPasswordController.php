<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Mail\ResetPassword;
use App\User;


class ResetPasswordController extends Controller
{
	public function resetPassReq(Request $request){
		Mail::to($request->email)->send(new ResetPassword());
	}

	public function resetPass($id,$codes){

	}

}
