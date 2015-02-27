<?php

class Pembayaran extends Eloquent {

    protected $table = 'Pembayaran';
    public $timestamps = false;

    public function pekerjaan() {
        return $this->belongsTo('Pekerjaan');
    }

    public function pegawai() {
        return $this->belongsTo('Pegawai');
    }

}