<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserTableSeeder
 *
 * @author Acer Aspire
 */

use Illuminate\Database\Seeder;

class TableSeeder extends Seeder{

    public function run() {        
        DB::table('informasipajak')->truncate();
        Informasipajak::create(array('Judul'=>'PPh Pasal 22', 'Konten' => ''));
        Informasipajak::create(array('Judul'=>'PPh Pasal 23', 'Konten' => ''));
        Informasipajak::create(array('Judul'=>'PPh Pasal 4 ayat (2)', 'Konten' => ''));
        Informasipajak::create(array('Judul'=>'Pajak Pertambahan Nilai (PPN)', 'Konten' => ''));
    }

}

