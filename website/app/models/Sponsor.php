<?php
/**
 * Created by PhpStorm.
 * 
 * User: firehat
 * Date: 2/12/15
 * Time: 8:49 PM
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Sponsor whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Sponsor whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Sponsor whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Sponsor whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Sponsor whereUpdatedAt($value)
 */

class Sponsor extends Eloquent {
    protected $table = 'sponsors';
    protected $guarded = ['id', 'created_at', 'updated_at',];

}