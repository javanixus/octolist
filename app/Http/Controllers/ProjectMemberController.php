<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\ProjectMember;
use App\Teacher;
use App\Project;

use JWTException;
use JWTAuth;
use Auth;

class ProjectMemberController extends Controller
{
    //

		public function store($id,Request $request){
			$this->validate($request,[
				'id_students'				=> 'required',
			]);


			ProjectMember::Create([
				'id_projects'		=>	$id,
				'id_students'	 =>		$request->input('id_students')
			]);
			$response = [
										'msg' => 'Project Created',
										'href' => "/v1/project/$id",
										'method' => 'GET',
									];

			return response()->json($response,200);
		}

		public function destroy($id,$member){
			ProjectMember::where('id_projects',$id)
					->where('id_students',$member)
					->delete();

			$response = [
						'msg' => 'Member Deleted',
						'href' => "/v1/project/$id",
						'method' => 'GET',
					];

					return response()->json($response,200);
		}
}
