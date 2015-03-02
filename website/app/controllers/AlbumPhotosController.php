<?php

class AlbumPhotosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * @param  int  $albumId
	 * @return Response
	 */
	public function index($albumId)
	{
		$navActive = 'gallery';
		$album = Album::find($albumId);
		$photos = $album->photos()->paginate(8);
		return View::make('photos.index')->with(['navActive' => $navActive, 'album' => $album, 'photos' => $photos,]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  int  $albumId
	 * @return Response
	 */
	public function create($albumId)
	{
		$album = Album::find($albumId);
		$navActive = 'gallery';
		return View::make('photos.create')->with(['navActive' => $navActive, 'album' => $album]);

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($albumId)
	{
		$fileProperty = 'file';
		$acceptedFileExtensions = [
			'JPG', 'JPEG',
		];
		$album = Album::find($albumId);

		$destinationPath = public_path().'/uploads/'.$album->id.'/';
		$thumbnailDestinationPath = $destinationPath.'thumbs/';
		if(!File::exists($thumbnailDestinationPath)) {
			File::makeDirectory($thumbnailDestinationPath, 0755, true);
		}

		$file = Input::file($fileProperty);
		$fileName = $file->getClientOriginalName();
		$fileExtension = $file->getClientOriginalExtension();

		if(!in_array(strtoupper($fileExtension), $acceptedFileExtensions)) {
			//return Response::json('Invalid File Type', 400);
			App::abort(400, 'Invalid File Type');
		}

		$success = $file->move($destinationPath, $fileName);
		if($success) {
			$photo = new Photo();
			$photo->name  = $fileName;
			$photo->path = $destinationPath.$fileName;
			$photo->thumbPath = $thumbnailDestinationPath.$fileName;
			$photo->album()->associate($album);
			$photo->save();

			$thumb = Image::make($photo->path);
			$thumb->fit(400, 300, function($constraint) {
				$constraint->aspectRatio();
			});
			$thumb->save($thumbnailDestinationPath.$fileName);
			return Response::json('OK', 200);
		}
		else {
			//return Response::json('Internal Server Error', 500);
			App::abort(500, 'Internal Server Error');
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $albumId
	 * @param  int  $photoId
	 * @return Response
	 */
	public function show($albumId, $photoId)
	{
		$navActive = 'gallery';
		$album = Album::find($albumId);
		$photo = Photo::find($photoId);

		return View::make('photos.show')->with(['navActive' => $navActive, 'album' => $album, 'photo' => $photo]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $albumId
	 * @param  int  $photoId
	 * @return Response
	 */
	public function edit($albumId, $photoId)
	{
		$navActive = 'gallery';
		$album = Album::find($albumId);
		$photo = Photo::find($photoId);
		return View::make('photos.edit')->with(['navActive' => $navActive, 'album' => $album, 'photo' => $photo]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $albumId
	 * @param  int  $photoId
	 * @return Response
	 */
	public function update($albumId, $photoId)
	{
		$input = Input::all();
		$photo = Photo::find($photoId);

		$validator = Photo::validate($input);
		if($validator->fails()) {
			return Redirect::to('/albums/'.$albumId.'/photos/'.$photo->id.'/edit/')->withInput($input)->withErrors($validator);
		}

		$photo->name = $input['name'];
		$photo->description = $input['description'];
		$photo->save();

		return Redirect::to('/albums/'.$albumId.'/photos/'.$photo->id.'/');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $albumId
	 * @param  int  $photoId
	 * @return Response
	 */
	public function destroy($albumId, $photoId)
	{
		$photo = Photo::find($photoId);
		File::delete($photo->path);
		File::delete($photo->thumbPath);
		Photo::destroy($photo->id);
		return Redirect::to('/albums/'.$albumId.'/photos/');
	}

	public function __construct() {
		$this->beforeFilter('adminAuth', ['except' => ['index', 'show']]);
	}

}
