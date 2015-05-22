<?php

class AlbumController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$navActive = 'gallery';
		//$albums = Album::where('isProjectAlbum', '=', False)->orderBy('created_at', 'desc')->paginate(4);
		$albums = Album::whereType(Album::$type['galleryAlbum'])->orderBy('created_at', 'desc')->paginate(4);
        return View::make('albums.index')->with(['navActive' => $navActive, 'albums' => $albums]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$navActive = 'gallery';
		return View::make('albums.create')->with(['navActive' => $navActive]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validator = Album::validate($input);
		if($validator->fails()) {
			return Redirect::to('/albums/create/')->withInput($input)->withErrors($validator);
		}
		$album = new Album();
		$album->name = $input['name'];
		$album->description = $input['description'];

		//if(isset($input['isProjectAlbum']))
		//	if($input['isProjectAlbum'] == "1")
		//		$album->isProjectAlbum = true;

        $album->type = Album::$type['galleryAlbum'];

		$album->save();

		return Redirect::to('/albums/');
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
		$navActive = 'gallery';
		$album = Album::find($id);

		return View::make('albums.edit')->with(['navActive' => $navActive, 'album' => $album]);
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
		$album = Album::find($id);
		$validator = Album::validate($input);

		if($validator->fails()) {
			return Redirect::to('/albums/'.$album->id.'/edit/')->withInput($input)->withErrors($validator);
		}

		$album->name = $input['name'];
		$album->description = $input['description'];
		/*
		if(isset($input['isProjectAlbum']))
			if($input['isProjectAlbum'] == "1")
				$album->isProjectAlbum = true;
		*/

        /* BEGIN Photo upload */

        $photoFileProperty = 'photoFile';
        $acceptedPhotoFileExtensions = [
            'JPG', 'JPEG',
        ];
        $albumDestinationPath = public_path().'/uploads/'.$album->id.'/';
        $photoDestinationPrefix = 'titlePhoto';

        if(Input::hasFile($photoFileProperty)) {
            if (!File::exists($albumDestinationPath)) {
                File::makeDirectory($albumDestinationPath, 0755, true);
            }

            $file = Input::file($photoFileProperty);
            $fileName = $photoDestinationPrefix . '_' . $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();

            if (!in_array(strtoupper($fileExtension), $acceptedPhotoFileExtensions)) {
                App::abort(400, 'Invalid File Type');
            }

            $success = $file->move($albumDestinationPath, $fileName);
            if ($success) {
                $photo = new Photo();
                $photo->name = $fileName;
                $photo->path = $albumDestinationPath . $fileName;
                $photo->save();

                $thumb = Image::make($photo->path);
                $thumb->fit(700, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumb->save($albumDestinationPath . $photo->name);

                // associate with album
                $album->titlePhoto()->associate($photo);
            } else {
                App::abort(500, 'Internal Server Error');
            }
        }
        /* END Photo Upload */

        $album->save();

		return Redirect::to('/albums/');
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
