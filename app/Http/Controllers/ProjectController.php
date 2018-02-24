<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\ProjectMemberController;
use App\ProjectMember;
use App\StudentsInfo;
use App\Project;
use App\User;

use JWTException;
use JWTAuth;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$this->validate($request,[
				'project_title' 			=> 'required',

			]);

			// $input[] = $request->input('project_creator',Auth::user()->id);
			// $input[] = $request->input('project_deadline');
			// $input[] = $request->input('project_title');
			// $input[] = $request->except(['id_students']);
			// return $input;
			$project = Project::Create([
				'project_title'				=>	$request->input('project_title'),
				'project_deadline'	=>	$request->input('project_deadline'),
				'project_creator'		=>	Auth::user()->id,
				'project_description' => $request->input('desc'),
			]);
			// $id = $project->id;
			if($project){
				$id = $project->id;
				$user = Auth::user()->id;
				$user = StudentsInfo::where('id_students',$user)->get()->first()->id;
				// $ProjectMember = new ProjectMemberController;
				// $ProjectMember->store($id,$request);

				ProjectMember::Create([
					'id_projects'		=>	$id,
					'id_students'	 =>	$user,
					]);

				$response = [
					'msg' => 'Project Created',
					'href' => "/v1/project/$id",
					'method' => 'GET',
				];

				return response()->json($response,200);
			}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

	public function showStudentProject()
	{
		$id = Auth::user()->id;
		$user = StudentsInfo::where('id_students',$id)->get()->first()->id;
		// $project = ProjectMember::where('id_students',$user)->get();
		$project = Project::join('project_members', 'projects.id', '=', 'project_members.id_projects')
											->select('project')
											->where('project_members.id_students', '=', $user);
											->get();
		if($user){
			$response = [
				'msg' => 'List of Project',
				'projects' => $project,
				'projects_count' => $project->count(),
			];
			return response()->json($response,200);
		}
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $this->validate($request,[
					'project_title'	=>	'required'
				]);
				$user = Project::FindOrFail($id);
				if(null == $request->input('project_deadline')){
					$user->update($request->only('project_title'));
					$response = [
						'msg' => 'Project Info Updated without deadline update',
						'href' => "/v1/project/$id",
						'method' => 'GET',
					];
				}else{
					$user->update($request->all());
					$response = [
												'msg' => 'Project Info Updated with deadline update',
												'href' => "/v1/project/$id",
												'method' => 'GET',
											];
				}
				return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

	/**
	*	Edit the specified Member Of the Project
	*
	*/
}
