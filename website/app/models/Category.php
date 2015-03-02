<?php
/**
 * Created by PhpStorm.
 * 
 * User: firehat
 * Date: 2/12/15
 * Time: 6:23 PM
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Article[] $articles
 * @method static \Illuminate\Database\Query\Builder|\Category whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Category whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\Category whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Category whereUpdatedAt($value)
 */

class Category extends Eloquent {
    protected $table = 'categories';
    protected $guarded = ['created_at', 'updated_at', 'id'];

    public function articles() {
        return $this->hasMany('Article');
    }

}
