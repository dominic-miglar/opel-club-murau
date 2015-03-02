<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

/**
 * User
 *
 * @property-read \Member $member
 * @property integer $id 
 * @property string $username 
 * @property string $password 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereUsername($value)
 * @method static \Illuminate\Database\Query\Builder|\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\User whereUpdatedAt($value)
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	protected $guarded = ['id',];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function member()
	{
		return $this->hasOne('Member');
	}

	public function isWebsiteAdmin()
	{
		if($this->member != null) {
			if($this->member->isWebsiteAdmin) {
				return true;
			}
		}
		return false;
	}

	public static function validate($input) {
		$rules = array(
			'username' => 'Required|Max:255|Alpha',
			'password' => 'Required|Max:255|AlphaNum|Between:4,30',
		);

		return Validator::make($input, $rules);
	}
}
