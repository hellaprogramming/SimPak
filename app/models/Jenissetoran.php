<?php
class Jenissetoran extends Eloquent {

    protected $table = 'Jenissetoran';
    protected $fillable = array('KodeJenisPajak', 'NamaSetoran', 'KodeJenisSetoran', 'Tarif');
    public $timestamps = false;
    
    public function pekerjaan() {
        return $this->hasMany('Pekerjaan');
    }
    
    public function jenispajak() {
        return $this->belongsTo('Jenispajak');
    }
    
}