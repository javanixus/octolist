<?php

namespace App\Http\Controllers;

use App\CardMember;
use App\Project;
use App\Card;

use Illuminate\Http\Request;

class CardMemberController extends Controller
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
    public function store($id,$card,Request $request)
    {
			$this->validate($request,[
				'id_students'				=> 'required',
			]);


			CardMember::Create([
				'id_cards'		=>	$card,
				'id_students'	 =>		$request->input('id_students')
			]);
			$response = [
										'msg' => 'Project Card Member Added',
										'href' => "/v1/project/$id",
										'method' => 'GET',
									];

			return response()->json($response,200);
		}


    /**
     * Display the specified resource.
     *
     * @param  \App\CardMember  $cardMember
     * @return \Illuminate\Http\Response
     */
    public function show($id,$card)
    {
			$memb = CardMember::join('students_info','cards_members.id_students','=','students_info.id')
									->where('id_cards',$card)
										->get();
			return $memb;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CardMember  $cardMember
     * @return \Illuminate\Http\Response
     */
    public function edit(CardMember $cardMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CardMember  $cardMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardMember $cardMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CardMember  $cardMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$card,$member)
    {
			CardMember::where('id_cards',$card)
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
