<?php
Route::group(array('before' => 'auth|bendahara.pembantu'), function () {
    
    Route::get('cetak-bukti-potong-konstruksi/{id}', 'Ccetak@BuktiPotongPasal4' );
    Route::get('cetak-bukti-potong-pasal22/{id}', 'Ccetak@BuktiPotongPasal22' );
    Route::get('cetak-bukti-potong-pasal23/{id}', 'Ccetak@BuktiPotongPasal23' );
    Route::get('cetak-ssp/{id}', 'Ccetak@SuratSetoranPajak');
    Route::get('cetak-faktur-pajak/{id}', 'Ccetak@FakturPajak');
    Route::get('cetak-ssp-ppn/{id}', 'Ccetak@SuratSetoranPajakPPN');
        
});

Route::group(array('before' => 'auth|bendahara.pengeluaran'), function () {
    Route::get('cetak-daftar-potong/{id_pasal}&{masa_pajak}', 'Ccetak@DBP');
    Route::get('cetak-SPTMasa-pasal22/{id_rekanan}&{masa_pajak}', 'Ccetak@SPTMasa22');
    Route::get('cetak-SPTMasa-pasal23/{id_rekanan}&{masa_pajak}', 'Ccetak@SPTMasa23');
    Route::get('cetak-SPTMasa-pasal4/{id_rekanan}&{masa_pajak}', 'Ccetak@SPTMasa4');
});