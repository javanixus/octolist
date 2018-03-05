<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\ProjectMember;
use App\StudentsInfo;
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
				// die($request->id_students);
				$id_member = StudentsInfo::where('id_students',$request->id_students)->first()->id;
				// echo ProjectMember::where([['id_projects','=',$id],
				// 																['id_students','=',$id_member]])
				// 											->count();
					if(ProjectMember::where('id_projects',$id)->where('id_students',$id_member)->count()==0){

					$memb = ProjectMember::Create([
											'id_projects'		=>	$id,
											'id_students'	 =>		$id_member,
										]);

					if($memb){
						$response = [
							'msg' => 'member Added',
						];
					}else{
						$reponse = [
							'msg' => 'member doesnt added',
						];
					}
					return response()->json($response,200);
				}else{
					$response = [
						'msg' => 'students already exist',
					];
					return response()->json($response,200);
				}

				}

		public function show($id){
			// return $id;
			// $member = Project::where('id_projects',$id)->ProjectMember()->get();
			$member = ProjectMember::join('students_info','project_members.id_students','=','students_info.id')
										->where('id_projects',$id)
										->select('*')
										->get();
			$response = [
				'msg' => $member,
			];
      //
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
