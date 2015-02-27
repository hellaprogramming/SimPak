<?php

use Illuminate\Database\Seeder;

class JenisPajakSeeder extends Seeder{

    public function run(){
        DB::table('jenispajak')->truncate();
        Jenispajak::create(array('KodeJenisPajak' => '411122','NamaPajak'=>'PPh Pasal 22', 'id' => 1));
        Jenispajak::create(array('KodeJenisPajak' => '411124','NamaPajak'=>'PPh Pasal 23', 'id' => 2));
        Jenispajak::create(array('KodeJenisPajak' => '411128','NamaPajak'=>'PPh Pasal 4 Ayat (2)', 'id' => 3));
        Jenispajak::create(array('KodeJenisPajak' => '411211','NamaPajak'=>'PPN', 'id' => 4));
        
        
        DB::table('jenissetoran')->truncate();
        //pasal 22
        Jenissetoran::create(array('KodeJenisPajak' => '411122', 'NamaSetoran' => 'PPh Pasal 22 Industri/Eksportir', 'KodeJenisSetoran' =>'900', 'Tarif' => 0.015 ));
        Jenissetoran::create(array('KodeJenisPajak' => '411122', 'NamaSetoran' => 'PPh Pasal 22 Bendaharawan/Badan Tertentu Yang Ditunjuk', 'KodeJenisSetoran' =>'900', 'Tarif' => 0.015));
        Jenissetoran::create(array('KodeJenisPajak' => '411122', 'NamaSetoran' => 'Baja', 'KodeJenisSetoran' =>'900', 'Tarif' => 0.015));
        Jenissetoran::create(array('KodeJenisPajak' => '411122', 'NamaSetoran' => 'Otomotif', 'KodeJenisSetoran' =>'900', 'Tarif' => 0.015));
        //pasal 23
        Jenissetoran::create(array('KodeJenisPajak' => '411124', 'NamaSetoran' => 'Sewa dan Penghasilan lain sehubungan dengan penggunaan harta', 'KodeJenisSetoran' =>'100', 'Tarif' => 0.020));
        Jenissetoran::create(array('KodeJenisPajak' => '411124', 'NamaSetoran' => 'Jasa Teknik', 'KodeJenisSetoran' =>'104', 'Tarif' => 0.020));
        Jenissetoran::create(array('KodeJenisPajak' => '411124', 'NamaSetoran' => 'Jasa Manajemen', 'KodeJenisSetoran' =>'104', 'Tarif' => 0.020));
        Jenissetoran::create(array('KodeJenisPajak' => '411124', 'NamaSetoran' => 'Jasa Konsultan', 'KodeJenisSetoran' =>'104', 'Tarif' => 0.020));
        //pasal 4 ayat(2) konstruksi
        Jenissetoran::create(array('KodeJenisPajak' => '411128', 'NamaSetoran' => 'Pelaksana Konstruksi: mempunyai kualifikasi usaha kecil', 'KodeJenisSetoran' =>'409', 'Tarif' => 0.020));
        Jenissetoran::create(array('KodeJenisPajak' => '411128', 'NamaSetoran' => 'Pelaksana Konstruksi: mempunyai kualifikasi usaha selain kecil','KodeJenisSetoran' =>'409', 'Tarif' => 0.030));
        Jenissetoran::create(array('KodeJenisPajak' => '411128', 'NamaSetoran' => 'Pelaksana Konstruksi: tidak mempunyai kualifikasi usaha', 'KodeJenisSetoran' =>'409', 'Tarif' => 0.040));
        Jenissetoran::create(array('KodeJenisPajak' => '411128', 'NamaSetoran' => 'Perencana/Pengawas Konstruksi: dengan kualifikasi usaha', 'KodeJenisSetoran' =>'409', 'Tarif' => 0.040));
        Jenissetoran::create(array('KodeJenisPajak' => '411128', 'NamaSetoran' => 'Perencana/Pengawas Konstruksi: tanpa kualifikasi usaha', 'KodeJenisSetoran' =>'409', 'Tarif' => 0.060));
//        PPN
        Jenissetoran::create(array('KodeJenisPajak' => '411211', 'NamaSetoran' => 'Pajak Pertambahan Nilai', 'KodeJenisSetoran' =>'900', 'Tarif' => 0.100));
    }

}