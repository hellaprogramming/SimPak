<?php

class Rekanan extends Eloquent {

    protected $table = 'Rekanan';
    protected $fillable = array('id_rekanan', 'NamaPerusahaan', 'NPWP', 'NamaDirektur', 'Alamat');
    public $timestamps = false;

    public function pekerjaan() {
        return $this->hasMany('Pekerjaan');
    }

}