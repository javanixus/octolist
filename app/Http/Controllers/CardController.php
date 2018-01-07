<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\CardMember;
use App\Card;

use JWTException;
use JWTAuth;
use Auth;

class CardController extends Controller
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
    public function store($id,Request $request)
    {
			$this->validate($request,[
				'card_title' 			=> 'required',
				'card_description' 	=> 'required',
			]);

			$card = Card::Create($request->all());
			$card = $card->id;
			DB::table('project_cards')
						->insert(['id_projects' => $id , 'id_cards' => $card]);

			// ProjectMember::Create([
			// 	'id_projects'		=>	$id,
			// 	'id_students'	 =>		$request->input('id_students')
			// ]);
			$response = [
										'msg' => 'Card Created',
										'href' => "/v1/project/$id",
										'method' => 'GET',
									];

			return response()->json($response,200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
