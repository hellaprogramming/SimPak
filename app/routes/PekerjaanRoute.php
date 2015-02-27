<?php
Route::group(array('before' => 'auth'), function () {
    Route::get('pekerjaan/json-cari-rekanan', function() {
        $post = Input::get('term');
        $post = '%' . $post . '%';
        $data = DB::table('Rekanan')->where('NamaPerusahaan', 'like', $post)->get();
        return Response::json($data);
    });
});

Route::group(array('before' => 'auth|bendahara.pembantu'), function () {
//    Route::get('pekerjaan', 'Cpekerjaan@index');
    Route::get('pekerjaan-pasal22', 'Cpekerjaan@index22');
    Route::get('pekerjaan-pasal23', 'Cpekerjaan@index23');
    Route::get('pekerjaan-pasal4', 'Cpekerjaan@index4');
    Route::post('pekerjaan/tambah-pekerjaan', 'Cpekerjaan@TambahPekerjaan');
    Route::get('pekerjaan-pasal22/daftar-pekerjaan', 'Cpekerjaan@DaftarPekerjaan22');
    Route::get('pekerjaan-pasal23/daftar-pekerjaan', 'Cpekerjaan@DaftarPekerjaan23');
    Route::get('pekerjaan-pasal4/daftar-pekerjaan', 'Cpekerjaan@DaftarPekerjaan4');
    Route::get('pekerjaan/data-ubah-pekerjaan/{id_pekerjaan}&{id_JenisPajak}', function($id_pekerjaan, $id_JenisPajak){
        $data['pekerjaan'] = DB::table('Pekerjaan')
                        ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
                        ->join('Jenissetoran', 'Pekerjaan.id_JenisSetoran', '=', 'Jenissetoran.id_JenisSetoran')
                        ->join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                        ->where('Pekerjaan.id_pekerjaan', $id_pekerjaan)->first();
        $data['kategori'] = Jenissetoran::join('Jenispajak', 'Jenissetoran.KodeJenisPajak', '=', 'Jenispajak.KodeJenisPajak')
                ->where('id', $id_JenisPajak)->get();
        return View::make('v_pekerjaan_edit', $data);
        
    });
    Route::post('pekerjaan/update-pekerjaan', 'Cpekerjaan@EditPekerjaan');
    Route::get('pekerjaan/hapus/info-jumlah-pembayaran/{id}', function($id){
    $data = Pembayaran::where('id_pekerjaan', $id)->get();
    $jumlahPembayaran['jml'] = count($data);
        return Response::json($jumlahPembayaran);
    });
    Route::get('pekerjaan/hapus/{id}', 'Cpekerjaan@HapusPekerjaan' );
    Route::post('pekerjaan/cari-data-pekerjaan', 'Cpekerjaan@CariPekerjaan');
    Route::get('pekerjaan/details-pekerjaan/{id}', 'Cpekerjaan@DetailPekerjaan');

//    Route::get('pekerjaan/daftar-pekerjaan', 'Cpekerjaan@DaftarPekerjaan');
//    Route::get('pekerjaan/daftar-pekerjaan-100', 'Cpekerjaan@DaftarPekerjaan100');
//    Route::get('pekerjaan/json-cari-nama-pekerjaan', function() {
//        $post = Input::get('term');
//        $post = '%' . $post . '%';
//        $data = DB::table('Pekerjaan')
//                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
//                ->where('Pekerjaan.PersentasePekerjaan', '!=', '100')
//                ->where('NamaPekerjaan', 'like', $post)->get();
//        return Response::json($data);
//    });
//    Route::get('pekerjaan/json-cari-nama-pekerjaan100', function() {
//        $post = Input::get('term');
//        $post = '%' . $post . '%';
//        $data = DB::table('Pekerjaan')
//                ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
//                ->where('Pekerjaan.PersentasePekerjaan', '=', '100')
//                ->where('NamaPekerjaan', 'like', $post)->get();
//        return Response::json($data);
//    });
    
//    Route::get('pekerjaan/detail-pekerjaan/{id}', function($id) {
//        $objek = DB::table('Pekerjaan')
//                        ->join('Rekanan', 'Pekerjaan.id_rekanan', '=', 'Rekanan.id_rekanan')
//                        ->join('Jenispajak', 'Pekerjaan.id_JenisPajak', '=', 'Jenispajak.id_JenisPajak')
//                        ->where('Pekerjaan.id_pekerjaan', $id)->first();
//        $tanggalPekerjaan = new \DateTime($objek->tanggalKontrak);
//        $data = array(
//            'id_pekerjaan' => $objek->id_pekerjaan,
//            'id_JenisPajak' => $objek->id_JenisPajak,
//            'NamaPekerjaan' => $objek->NamaPekerjaan,
//            'tanggalKontrak' => $tanggalPekerjaan->format('d-m-Y'),
//            'NamaPajak' => $objek->NamaPajak,
//            'NilaiKontrak' => number_format($objek->NilaiKontrak, 0, ',', '.'),
//            'MetodeHitung' => $objek->MetodeHitung,
//            'PersentasePekerjaan' => $objek->PersentasePekerjaan,
//            'NamaPerusahaan' => $objek->NamaPerusahaan,
//            'NPWP' => $objek->NPWP,
//            'NamaDirektur' => $objek->NamaDirektur,
//            'Alamat' => $objek->Alamat
//        );
//        $objek = (object) $data;
//        return View::make('v_pekerjaan_detail')->with('datas', $objek);
//    });

});
