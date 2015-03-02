<?php
/**
 * Created by PhpStorm.
 * 
 * User: firehat
 * Date: 2/13/15
 * Time: 9:57 AM
 *
 * @property-read \Album $album 
 */

class Photo extends Eloquent {
    protected $table = 'photos';
    protected $guarded = ['id', 'created_at', 'updated_at', 'album_id',];

    public function album()
    {
        return $this->belongsTo('Album');
    }

    public function getPath() {
        $explodePaths = explode(public_path(), $this->path);
        $path = $explodePaths[1];

        return $path;
    }

    public function getThumbPath()
    {
        $explodePaths = explode(public_path(), $this->thumbPath);
        $path = $explodePaths[1];

        return $path;
    }

    public static function validate($input) {
        $rules = array(
            'name' => 'Max:255',
            'description' => 'Max:255',
        );

        return Validator::make($input, $rules);
    }
}