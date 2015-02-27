<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RekananSeeder
 *
 * @author Acer Aspire
 */
use Illuminate\Database\Seeder;
class RekananSeeder extends Seeder{
    public function run(){
        DB::table('rekanan')->truncate();
        $rekanan = new Rekanan;
        $rekanan->NamaPerusahaan = 'Bendahara Rutin DPU Kab.Kutai Timur';
        $rekanan->NPWP = '00.313.178.6-724.000';
        $rekanan->NamaDirektur = 'SUFRANSYAH, SE';
        $rekanan->Alamat = 'Kawasan Pusat Pemerintahan Bukit Pelangi Sangatta';
        $rekanan->save();
        
        $rekanan2 = new Rekanan;
        $rekanan2->NamaPerusahaan = 'PT.Wahyu Perdana';
        $rekanan2->NPWP = '01.233.123.4-124.046';
        $rekanan2->NamaDirektur = 'Randa Wahyu Pradhana S.Kom';
        $rekanan2->Alamat = 'Jln.Delima Gg.Delima II Sangatta';
        $rekanan2->save();
    }
}

?>
