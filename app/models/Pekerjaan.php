<?php

class Pekerjaan extends Eloquent {

    protected $table = 'Pekerjaan';
    protected $fillable = array('id_rekanan', 'id_JenisSetoran', 'KategoriPelaksana',
                                'NamaPekerjaan', 'NilaiKontrak',
                                'PersentasePekerjaan', 'MetodeHitung',
                                'tanggalKontrak' );                
    public $timestamps = false;

    public function rekanan() {
        return $this->belongsTo('Rekanan');
    }

    public function pembayaran() {
        return $this->hasMany('Pembayaran');
    }

    public function kategoripajak() {
        return $this->belongsTo('Kategoripajak');
    }

}