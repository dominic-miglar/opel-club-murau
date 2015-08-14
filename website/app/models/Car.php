<?php

class Car extends Eloquent {
    protected $table = 'cars';
    protected $guarded = ['id', 'album_id', ];

    public function member() {
        return $this->belongsTo('Member');
    }

    public function album() {
        return $this->belongsTo('Album');
    }

    public static function validate($input) {
        $rules = array(
            'manufacturer' => 'Required|Max:255',
            'model' => 'Required|Max:255',
            'yearBuilt' => 'Integer',
            'horsepower' => 'Integer',
            'member_id' => 'exists:members,id',
        );

        return Validator::make($input, $rules);
    }
}
