<?php

class Informasipajak extends Eloquent {

    protected $table = 'Informasipajak';
    protected $fillable = array('Judul', 'Konten');
    public $timestamps = false;
}
