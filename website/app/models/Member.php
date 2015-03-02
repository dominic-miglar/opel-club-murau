<?php
/**
 * Created by PhpStorm.
 * 
 * User: firehat
 * Date: 2/12/15
 * Time: 6:29 PM
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $role
 * @property string $welcomeText
 * @property boolean $onlySupporting
 * @property integer $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \User $user
 * @method static \Illuminate\Database\Query\Builder|\Member whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Member whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\Member whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\Member whereRole($value)
 * @method static \Illuminate\Database\Query\Builder|\Member whereWelcomeText($value)
 * @method static \Illuminate\Database\Query\Builder|\Member whereOnlySupporting($value)
 * @method static \Illuminate\Database\Query\Builder|\Member whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\Member whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Member whereUpdatedAt($value)
 */

class Member extends Eloquent {
    protected $table = 'members';
    protected $guarded = ['id', 'created_at', 'updated_at', 'user_id'];

    public function user() {
        return $this->belongsTo('User');
    }

    public function photo() {
        return $this->belongsTo('Photo');
    }

    public static function validate($input, $update=false) {
        $rules = array(
            'firstName' => 'Required|Max:255',
            'lastName' => 'Required|Max:255',
            'birthdate' => 'date',
            'role' => 'Max:255',
            'telephoneNumber' => 'Max:255',
            'email' => 'Max:255',
            'facebookLink' => 'Max:255',
            'job' => 'Max:255',
            'employer' => 'Max:255',
            'memberSince' => 'Required|Integer',
            'onlySupporting' => 'boolean',
            'isWebsiteAdmin' => 'boolean',
        );

        $updateRules = array(
            'firstName' => 'Required|Max:255',
            'lastName' => 'Required|Max:255',
            'birthdate' => 'date',
            'role' => 'Max:255',
            'telephoneNumber' => 'Max:255',
            'email' => 'Max:255',
            'facebookLink' => 'Max:255',
            'job' => 'Max:255',
            'employer' => 'Max:255',
            'memberSince' => 'Required|Integer',
            'onlySupporting' => 'boolean',
            'isWebsiteAdmin' => 'boolean',
        );

        if($update)
            return Validator::make($input, $updateRules);
        else
            return Validator::make($input, $rules);
    }

}