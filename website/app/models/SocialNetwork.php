<?php
/**
 * Created by PhpStorm.
 * 
 * User: firehat
 * Date: 2/12/15
 * Time: 8:57 PM
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\SocialNetwork whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\SocialNetwork whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\SocialNetwork whereLink($value)
 * @method static \Illuminate\Database\Query\Builder|\SocialNetwork whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\SocialNetwork whereUpdatedAt($value)
 */

class SocialNetwork extends Eloquent {
    protected $table = 'socialnetworks';
    protected $guarded = ['id', 'created_at', 'updated_at',];

}