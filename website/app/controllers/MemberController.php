<?php

class MemberController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$navActive = 'members';
		$membersArticle = Article::whereSlug('members')->first();

		$managingCommitteeMembers = Member::whereNotNull('role')->get();
		$members = Member::where('role', '=', null)->where('onlySupporting', '=', False)->get();
		$onlySupportingMembers = Member::where('role', '=', null)->where('onlySupporting', '=', True)->get();

		return View::make('members.index')->with(['navActive' => $navActive, 'membersArticle' => $membersArticle, 'managingCommitteeMembers' => $managingCommitteeMembers, 'members' => $members, 'onlySupportingMembers' => $onlySupportingMembers,]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$navActive = 'members';
		return View::make('members.create')->with(['navActive' => $navActive]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$user_validator = User::validate($input);
		$member_validator = Member::validate($input);
		if($member_validator->fails() || $user_validator->fails()) {
			return Redirect::to('/members/create/')->withInput($input)->withErrors($user_validator, 'user')->withErrors($member_validator, 'member');
		}

		$newUser = User::create([
			'username' => $input['username'],
			'password' => Hash::make($input['password']),
		]);

		$newMember = new Member();
		$newMember->firstName = $input['firstName'];
		$newMember->lastName = $input['lastName'];
		$newMember->memberSince = $input['memberSince'];
		if(isset($input['isWebsiteAdmin']))
			if($input['isWebsiteAdmin'] == "1")
				$newMember->isWebsiteAdmin = true;
		if(isset($input['onlySupporting']))
			if($input['onlySupporting'] == "1")
				$newMember->onlySupporting = true;
		if($input['birthdate'] != '')
			$newMember->birthdate = $input['birthdate'];
		if($input['email'] != '')
			$newMember->email = $input['email'];
		if($input['telephoneNumber'] != '')
			$newMember->telephoneNumber = $input['telephoneNumber'];
		if($input['facebookLink'] != '')
			$newMember->facebookLink = $input['facebookLink'];
		if($input['role'] != '')
			$newMember->role = $input['role'];
		if(isset($input['welcomeText']))
			if($input['welcomeText'] != '')
				$newMember->welcomeText = $input['welcomeText'];
		if(isset($input['description']))
			if($input['description'] != '')
				$newMember->description = $input['description'];
		if($input['job'] != '')
			$newMember->job = $input['job'];
		if($input['employer'] != '')
			$newMember->employer = $input['employer'];
		$newMember->user()->associate($newUser);
		$newMember->save();

		return Redirect::to('/members/');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$navActive = 'members';
		$member = Member::find($id);

		return View::make('members.show')->with(['navActive' => $navActive ,'member' => $member,]);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$navActive = 'members';
		$member = Member::find($id);
		return View::make('members.edit')->with(['navActive' => $navActive, 'member' => $member]);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$photoFileProperty = 'photoFile';
		$acceptedPhotoFileExtensions = [
			'JPG', 'JPEG',
		];
		$photoDestinationPath = public_path().'/uploads/memberPhotos/';

		$member = Member::find($id);
		$input = Input::all();
		$member_validator = Member::validate($input, true);

		if($member_validator->fails()) {
			return Redirect::to('/members/'.$member->id.'/edit/')->withInput($input)->withErrors($member_validator, 'member');
		}

		$member->firstName = $input['firstName'];
		$member->lastName = $input['lastName'];
		$member->memberSince = $input['memberSince'];

		if(isset($input['isWebsiteAdmin']))
			if($input['isWebsiteAdmin'] == "1")
				$member->isWebsiteAdmin = true;

		if(isset($input['onlySupporting']))
			if($input['onlySupporting'] == "1")
				$member->onlySupporting = true;

		if($input['birthdate'] != '')
			$member->birthdate = $input['birthdate'];

		if($input['email'] != '')
			$member->email = $input['email'];

		if($input['telephoneNumber'] != '')
			$member->telephoneNumber = $input['telephoneNumber'];

		if($input['facebookLink'] != '')
			$member->facebookLink = $input['facebookLink'];

		if($input['role'] != '')
			$member->role = $input['role'];

		if(isset($input['welcomeText']))
			if($input['welcomeText'] != '')
				$member->welcomeText = $input['welcomeText'];

		if(isset($input['description']))
			if($input['description'] != '')
				$member->description = $input['description'];

		if($input['job'] != '')
			$member->job = $input['job'];

		if($input['employer'] != '')
			$member->employer = $input['employer'];

		/* BEGIN Photo upload */

		if(Input::hasFile($photoFileProperty)) {
			if (!File::exists($photoDestinationPath)) {
				File::makeDirectory($photoDestinationPath, 0755, true);
			}

			$file = Input::file($photoFileProperty);
			$fileName = $member->id . '_' . $file->getClientOriginalName();
			$thumbFileName = $member->id . '_thumb_' . $file->getClientOriginalName();
			$fileExtension = $file->getClientOriginalExtension();

			if (!in_array(strtoupper($fileExtension), $acceptedPhotoFileExtensions)) {
				App::abort(400, 'Invalid File Type');
			}

			$success = $file->move($photoDestinationPath, $fileName);
			if ($success) {
				$photo = new Photo();
				$photo->name = $fileName;
				$photo->path = $photoDestinationPath . $fileName;
				$photo->thumbPath = $photoDestinationPath . $thumbFileName;
				$photo->save();

				$thumb = Image::make($photo->path);
				$thumb->fit(600, 600, function ($constraint) {
					$constraint->aspectRatio();
				});
				$thumb->save($photoDestinationPath . $thumbFileName);

				// associate with member
				$member->photo()->associate($photo);
			} else {
				App::abort(500, 'Internal Server Error');
			}
		}
		/* END Photo Upload */

		$member->save();

		return Redirect::to('/members/'.$member->id.'/');
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

	public function editPhoto(){}


}
