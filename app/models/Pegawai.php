<?php

class Pegawai extends Eloquent {

    protected $table = 'Pegawai';
    public $timestamps = false;

    public function pembayaran() {
        return $this->hasMany('Pembayaran');
    }

}