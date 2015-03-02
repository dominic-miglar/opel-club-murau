<?php

class AuthenticationController extends \BaseController {
	public function showLoginPage()
	{
		$navActive = null;
		return View::make('auth.login')->with([
			'navActive' => $navActive,
		]);
	}

	public function processLogin()
	{
		$input = Input::all();
		$user_validator = User::validate($input);

		if($user_validator->fails()) {
			return Redirect::to('/auth/login/')->withInput($input)->withErrors($user_validator);
		}

		$remember = Input::get('remember', false);
		if (Auth::attempt(array('username' => $input['username'], 'password' => $input['password']), $remember))
		{
			return Redirect::intended('/');
		}
		return Redirect::to('/auth/login/');
	}

	public function processLogout()
	{
		if(Auth::check()) {
			Auth::logout();
		}
		return Redirect::to('/auth/login/');
	}
}
