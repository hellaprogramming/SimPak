<?php

Route::group(array('before' => 'auth|super.user'), function () {
    Route::get('daftar-user', 'Cadmin@getAllUser');
    Route::get('daftar-user/reset-password/{id}', 'Cadmin@resetPassword');
    Route::get('daftar-user/detail-user/{id}', 'Cadmin@detailUser');
    Route::get('daftar-user/hapus-user/{id}+{username}', 'Cadmin@hapusUser');
    Route::post('daftar-user/tambah-user', 'Cadmin@tambahUser');
    
    Route::get('data-pajak', 'Cadmin@getAllDataPajak');
    Route::get('data-pajak/edit-pajak/{id}', 'Cadmin@getEditPajak');
    Route::post('data-pajak/update-pajak', 'Cadmin@updatePajak');
    
    Route::get('master-informasi-pajak', 'Cadmin@getAllInformasiPajak');
    Route::get('master-informasi-pajak/edit-pajak/{id}', 'Cadmin@getEditInformasi');
    Route::post('master-informasi-pajak/update-pajak', 'Cadmin@updateInformasi');
});

