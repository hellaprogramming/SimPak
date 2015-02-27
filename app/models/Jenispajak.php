<?php

class Jenispajak extends Eloquent {

    protected $table = 'Jenispajak';
    protected $fillable = array('KodeJenisPajak','NamaPajak');
    public $timestamps = false;

    public function kategoripajak() {
        return $this->hasMany('kategoripajak');
    }

}