<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\ProjectMember;
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

			$collection = collect($request->input('id_students'));
			$collection = str_replace('[','',$collection);
			$collection = str_replace(']','',$collection);
			$collection = str_replace('"','',$collection);
			// $collection->toJson();
			$collection = explode(',',$collection);
			// $collection = implode(',',$collection);
			// return $collection;

			for($x=0;$x<=(count($collection)-1);$x++){
				if(null==$collection[$x]){
					break;
				}else
				{
					if(ProjectMember::where('id_projects',$id)->where('id_students',$collection[$x])->count()==0){

					ProjectMember::Create([
						'id_projects'		=>	$id,
						'id_students'	 =>		$collection[$x]
					]);
				}else{
					continue;
				}
					// echo $collection[0];
					// $data = str_replace('[','',$collection[0]);
					// $data = str_replace(']','',$collection[$x]);
					// echo $data;
					// echo $collection[$x];
				}
			}

			$response = [
										'msg' => 'Project Created',
										'href' => "/v1/project/$id",
										'method' => 'GET',
									];
				// return $
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
