<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersSeeder
 *
 * @author Acer Aspire
 */
use Illuminate\Database\Seeder;
class UsersSeeder extends Seeder{
    public function run(){
        DB::table('pegawai')->truncate();
        $pegawai = new Pegawai;
        $pegawai->Nama = 'Sufransyah SE.';
        $pegawai->Npwp = '00.313.178.6-724.000';
        $pegawai->NpwpDinas = '89.090.295.0-724.000';
        $pegawai->NIP = '196711122007011019';
        $pegawai->Alamat = 'Kawasan Pemerintahan bukit pelangi Sangatta';
        $pegawai->Telepon = '08780292112';
        $pegawai->Email = 'Sufransyah@gmail.com';
        $pegawai->save();
        
        $pegawai2 = new Pegawai;
        $pegawai2->Nama = 'Yohana SE., MM.';
        $pegawai2->NpwpDinas = '89.090.295.0-724.000';
        $pegawai2->NIP = '196711122007011219';
        $pegawai2->Alamat = 'Jl Pendidikan';
        $pegawai2->Telepon = '081382831823';
        $pegawai2->Email = 'yohana@gmail.com';
        $pegawai2->save();
        
        $pegawai3 = new Pegawai;
        $pegawai3->Nama = 'Ridwan';
        $pegawai3->NpwpDinas = '89.090.295.0-724.000';
        $pegawai3->NIP = '196711122006911019';
        $pegawai3->Alamat = 'Jl Karya Etam';
        $pegawai3->Telepon = '08780292112';
        $pegawai3->Email = 'ridwan@yahoo.com';
        $pegawai3->save();
        
        DB::table('users')->truncate();
        
        $userX = new User;
        $userX->username = 'sufransyah';
        $userX->id_pegawai = 1;
        $userX->password = Hash::make(1234);
        $userX->jenis_user = 'bendahara_pengeluaran';
        $userX->save();
               
        $user2 = new User;
        $user2->username = 'arsyan';
        $user2->id_pegawai = 2;
        $user2->password = Hash::make(1234);
        $user2->jenis_user = 'bendahara_pembantu';
        $user2->save();
        
        $user3 = new User;
        $user3->username = 'admin';
        $user3->id_pegawai = 3;
        $user3->password = Hash::make(1234);
        $user3->jenis_user = 'super_user';
        $user3->save();
        
//        $user = new User;
//        $user->username = 'randawahyup';
//        $user->password = Hash::make(1234);
//        $user->email = 'randaw46.rw@gmail.com';
//        $user->jenis_user = 'super_user';
//        $user->nama_lengkap = 'Randa Wahyu Pradhana';
//        $user->alamat = 'Jln Delima, Sangatta Kalimantan Timur';
//        $user->telepon = '081391006092';
//        $user->save();
    }
}

?>
