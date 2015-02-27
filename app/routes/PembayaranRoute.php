<?php

Route::group(array('before' => 'auth|bendahara.pembantu'), function () {
    
    Route::get('pembayaran/modal-pembayaran/{id}', 'Cpembayaran@FormTambahPembayaran');
    Route::get('pembayaran/pasal22', 'Cpembayaran@indexPasal22');
    Route::get('pembayaran/pasal23', 'Cpembayaran@indexPasal23');
    Route::get('pembayaran/pasal4', 'Cpembayaran@indexPasal4');
    Route::post('pembayaran/simpan-pembayaran', 'Cpembayaran@TambahPembayaran');
    Route::get('pembayaran/daftar-pembayaran/{id}', 'Cpembayaran@daftarPembayaran');
    Route::get('pembayaran/data-ubah-pembayaran/{id_pembayaran}', function($id_pembayaran){
        $data['pembayaran'] = DB::table('Pembayaran')
                        ->join('Pekerjaan', 'Pekerjaan.id_pekerjaan', '=', 'Pembayaran.id_pekerjaan')
                        ->join('Jenissetoran', 'Jenissetoran.id_JenisSetoran', '=', 'Pekerjaan.id_JenisSetoran')
                        ->where('Pembayaran.id_pembayaran', $id_pembayaran)->first();
        return View::make('v_pembayaran_edit', $data);
    });
    Route::post('pembayaran/update-pembayaran', 'Cpembayaran@EditPembayaran');
    Route::get('pembayaran/hapus/{id}', 'Cpembayaran@HapusPembayaran');
    Route::post('pembayaran/cari-data-pembayaran', 'Cpembayaran@cariDataPembayaran');
    
});
