<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$navActive = 'contact';
		$contactArticle = Article::whereSlug('contact')->first();
		$socialNetworks = SocialNetwork::all();

		return View::make('contact.index')->with(['navActive' => $navActive, 'contactArticle' => $contactArticle, 'socialNetworks' => $socialNetworks,]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$rules = array(
			'name' => 'Required|Max:255',
			'email' => 'Required|Max:255',
			'message' => 'Required',
		);

		$validator = Validator::make($input, $rules);

		if($validator->fails()) {
			return Redirect::to('/contact/')->withInput($input)->withErrors($validator);
		}

		Mail::send('contact.email', array('name' => 'name', 'email' => 'email', 'msgBody' => 'msgBody'), function($message)
		{
			$message->to('opelclubmurau@gmail.com', 'Opel-Club-Murau')->subject('Kontaktaufnahme!');
		});

		return Redirect::to('/contact/')->with(['message' => 'Deine Kontaktanfrage wurde versendet!']);

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
