<?php

class DescriptionArticleController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		$descriptionArticle = Article::find($id);
		if($descriptionArticle->locked != true) {
			// return error
		}

		$navActive = '';
		switch($descriptionArticle->slug) {
			case 'news':
				$navActive = 'news';
				break;
			case 'imprint':
				$navActive = 'imprint';
				break;
			case 'about':
				$navActive = 'about';
				break;
			case 'members':
				$navActive = 'members';
				break;
			case 'contact':
				$navActive = 'contact';
				break;
			default:
				$navActive = '';
				break;
		}

		return View::make('description.edit')->with(['navActive' => $navActive, 'article' => $descriptionArticle]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$input = Input::all();
		$descriptionArticle = Article::find($id);

		$validator = Article::validateUpdate($input, $descriptionArticle->id);
		if($validator->fails()) {
			return Redirect::to('/description/'.$descriptionArticle->id.'/edit/')->withInput($input)->withErrors($validator);
		}

		$descriptionArticle->subject = $input['subject'];
		$descriptionArticle->body = $input['body'];
		$descriptionArticle->save();

		switch($descriptionArticle->slug) {
			case 'news':
				return Redirect::to('/news/');
				break;
			case 'imprint':
				return Redirect::to('/imprint/');
				break;
			case 'about':
				return Redirect::to('/about/');
				break;
			case 'members':
				return Redirect::to('/members/');
				break;
			case 'contact':
				return Redirect::to('/contact/');
				break;
			default:
				return Redirect::to('/');
		}
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

	public function __construct() {
		$this->beforeFilter('adminAuth', ['except' => ['index', 'show']]);
	}



}
