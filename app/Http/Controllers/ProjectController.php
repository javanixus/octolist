<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\ProjectMemberController;
use App\ProjectMember;
use App\Teacher;
use App\Project;

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
				'project_deadline' 	=> 'required',
				'id_students'				=> 'required',
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
			]);
			$id = $project->id;
			$ProjectMember = new ProjectMemberController;
			$ProjectMember->store($id,$request);
			// ProjectMember::Create([
			// 	'id_projects'		=>	$id,
			// 	'id_students'	 =>		$request->input('id_students')
			// ]);
			$response = [
										'msg' => 'Project Created',
										'href' => "/v1/project/$id",
										'method' => 'GET',
									];

			return response()->json($response,200);

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
