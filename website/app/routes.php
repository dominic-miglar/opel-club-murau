<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('/news/');
});

Route::resource('news', 'NewsController');
Route::resource('imprint', 'ImprintController');
Route::resource('about', 'AboutController');
Route::resource('members', 'MemberController');
Route::resource('contact', 'ContactController');
Route::resource('albums', 'AlbumController');
Route::resource('description', 'DescriptionArticleController');
Route::resource('albums.photos', 'AlbumPhotosController');
Route::resource('cars', 'CarController');
Route::get('/test/', 'TestController@testupload');
Route::post('/test/', 'TestController@testupload');
Route::get('/auth/login/', 'AuthenticationController@showLoginPage');
Route::post('/auth/login/', 'AuthenticationController@processLogin');
Route::get('/auth/logout/', 'AuthenticationController@processLogout');