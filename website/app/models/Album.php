<?php
/**
 * Created by PhpStorm.
 * 
 * User: firehat
 * Date: 2/13/15
 * Time: 9:53 AM
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Photo[] $photos 
 */

class Album extends Eloquent {
    protected $table = 'albums';
    protected $guarded = ['id', 'created_at', 'updated_at',];

    public static $type = [
        'galleryAlbum' => 1,
        'carAlbum' => 2,
        'projectAlbum' => 3,
        'aboutAlbum' => 4,
    ];

    public function photos()
    {
        return $this->hasMany('Photo');
    }

    public function titlePhoto() {
        return $this->belongsTo('Photo');
    }

    public static function validate($input) {
        $rules = array(
            'name' => 'Required|Max:255',
            'description' => 'Required|Max:255',
            //'isProjectAlbum' => 'boolean',
        );
        return Validator::make($input, $rules);
    }
}
