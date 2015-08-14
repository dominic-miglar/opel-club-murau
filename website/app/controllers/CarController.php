<?php

class CarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$navActive = 'cars';
        $cars = Car::paginate(4);
        return View::make('cars.index')->with(['navActive' => $navActive, 'cars' => $cars, ]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$navActive = 'cars';
        return View::make('cars.create')->with(['navActive' => $navActive, ]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
        $validator = Car::validate($input);

        if($validator->fails()) {
            return Redirect::to('/cars/create/')->withInput($input)->withErrors($validator);
        }

        $member = Member::find($input['member']);

        $album = Album::create([
            'name' => $input['manufacturer'].' '.$input['model'],
            'type' => Album::$type['carAlbum'],
        ]);

        $car = new Car();
        $car->manufacturer = $input['manufacturer'];
        $car->model = $input['model'];
        $car->description = $input['description'];
        $car->yearBuilt = $input['yearBuilt'];
        $car->horsepower = $input['horsepower'];
        $car->member()->associate($member);
        $car->album()->associate($album);
        $car->save();

        return Redirect::to('/cars/');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$navActive = 'cars';
        $car = Car::find($id);
        $photos = Photo::whereAlbumId($car->album->id)->get();
        return View::make('cars.show')->with(['navActive' => $navActive, 'car' => $car, 'photos' => $photos, ]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$navActive = 'cars';
        $car = Car::find($id);
        return View::make('cars.edit')->with(['navActive' => $navActive, 'car' => $car, ]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $car = Car::find($id);

        $input = Input::all();
        $validator = Car::validate($input);

        if($validator->fails()) {
            return Redirect::to('/cars/'.$car->id.'/edit/')->withInput($input)->withErrors($validator);
        }

        $member = Member::find($input['member']);

        $car->manufacturer = $input['manufacturer'];
        $car->model = $input['model'];
        $car->description = $input['description'];
        $car->yearBuilt = $input['yearBuilt'];
        $car->horsepower = $input['horsepower'];

        $car->member()->associate($member);
        $car->save();

        return Redirect::to('/cars/'.$car->id.'/');
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
