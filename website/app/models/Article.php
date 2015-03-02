<?php
/**
 * Created by PhpStorm.
 * 
 * User: firehat
 * Date: 2/12/15
 * Time: 6:26 PM
 *
 * @property integer $id
 * @property string $subject
 * @property string $body
 * @property string $slug
 * @property integer $category_id
 * @property integer $member_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Member $member
 * @property-read \Category $category
 * @method static \Illuminate\Database\Query\Builder|\Article whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\Article whereSubject($value)
 * @method static \Illuminate\Database\Query\Builder|\Article whereBody($value)
 * @method static \Illuminate\Database\Query\Builder|\Article whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\Article whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\Article whereMemberId($value)
 * @method static \Illuminate\Database\Query\Builder|\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Article whereUpdatedAt($value)
 */

class Article extends Eloquent {
    protected $table = 'articles';
    protected $guareded = ['id', 'created_at', 'updated_at', 'member_id', 'category_id'];

    public function member() {
        return $this->belongsTo('Member');
    }

    public function category() {
        return $this->belongsTo('Category');
    }

    public static function validate($input, $update = false) {
        $rules = array(
            'subject' => 'Required|Max:255',
            'body' => 'Required',
            'slug' => 'Required|unique:articles',
        );

        return Validator::make($input, $rules);
    }

    public static function validateUpdate($input, $id) {
        $rules = array(
            'subject' => 'Required|Max:255',
            'body' => 'Required',
            'slug' => 'Required|unique:articles,slug,'.$id,
        );

        return Validator::make($input, $rules);
    }


}