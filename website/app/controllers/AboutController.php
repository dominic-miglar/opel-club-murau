<?php

class AboutController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$navActive = 'about';

		$category = Category::whereName('about')->first();
		$articles = $category->articles()->orderBy('created_at', 'desc')->paginate(2);
		$aboutArticle = Article::whereSlug('about')->first();
		$socialNetworks = SocialNetwork::all();

		$members = Member::where('onlySupporting', '=', False)->get();
		$membersOnlySupporting = Member::where('onlySupporting', '=', True)->get();

		return View::make('about.index')->with(['navActive' => $navActive, 'articles' => $articles, 'aboutArticle' => $aboutArticle, 'socialNetworks' => $socialNetworks, 'members' => $members, 'membersOnlySupporting' => $membersOnlySupporting, ]);

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$navActive = 'about';
		return View::make('about.create')->with(['navActive' => $navActive]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$category = Category::whereName('about')->first();
		$member = Auth::user()->member;

		$validator = Article::validate($input);

		if($validator->fails()) {
			return Redirect::to('/about/create/')->withInput($input)->withErrors($validator);
		}

		$article = new Article();
		$article->slug = $input['slug'];
		$article->subject = $input['subject'];
		$article->body = $input['body'];
		$article->member()->associate($member);
		$article->category()->associate($category);
		$article->save();

		return Redirect::to('/about/');

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
		$navActive = 'about';
		$article = Article::find($id);
		return View::make('about.edit')->with(['navActive' => $navActive, 'article' => $article]);

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
		$article = Article::find($id);

		$validator = Article::validateUpdate($input, $article->id);
		if($validator->fails()) {
			return Redirect::to('/about/'.$article->id.'/edit/')->withInput($input)->withErrors($validator);
		}

		$article->subject = $input['subject'];
		$article->body = $input['body'];
		$article->save();

		return Redirect::to('/about/');
	}


	/**
	 * Remove the specified resource from storage.
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$article = Article::find($id);
		if($article->locked == false) {
			Article::destroy($id);
		}
		return Redirect::to('/about/');
	}

	public function __construct() {
		$this->beforeFilter('adminAuth', ['except' => ['index', 'show']]);
	}



}
