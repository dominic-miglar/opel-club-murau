<?php

class NewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$navActive = 'news';

		$category = Category::whereName('news')->first();
		$articles = $category->articles()->orderBy('created_at', 'desc')->paginate(2);
		$welcomeArticle = Article::whereSlug('news')->first();
		$sponsors = Sponsor::all();
		$socialNetworks = SocialNetwork::all();

		return View::make('news.index')->with(['navActive' => $navActive, 'articles' => $articles, 'welcomeArticle' => $welcomeArticle, 'sponsors' => $sponsors, 'socialNetworks' => $socialNetworks]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$navActive = 'news';
		return View::make('news.create')->with(['navActive' => $navActive]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$category = Category::whereName('news')->first();
		$member = Auth::user()->member;

		$validator = Article::validate($input);

		if($validator->fails()) {
			return Redirect::to('/news/create/')->withInput($input)->withErrors($validator);
		}

		$article = new Article();
		$article->slug = $input['slug'];
		$article->subject = $input['subject'];
		$article->body = $input['body'];
		$article->member()->associate($member);
		$article->category()->associate($category);
		$article->save();

		return Redirect::to('/news/');
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
		$navActive = 'news';
		$article = Article::find($id);
		return View::make('news.edit')->with(['navActive' => $navActive, 'article' => $article]);
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
			return Redirect::to('/news/'.$article->id.'/edit/')->withInput($input)->withErrors($validator);
		}

		$article->subject = $input['subject'];
		$article->body = $input['body'];
		$article->save();

		return Redirect::to('/news/');
	}


	/**
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
		return Redirect::to('/news/');
	}

	public function __construct() {
		$this->beforeFilter('adminAuth', ['except' => ['index', 'show']]);
	}

}
