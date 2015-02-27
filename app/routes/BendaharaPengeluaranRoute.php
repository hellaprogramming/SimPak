<?php
Route::group(array('before' => 'auth|bendahara.pengeluaran'), function () {
    Route::get('daftar-bukti-potong/pasal22', 'Ccetak@vDaftarBuktiPotongPasal22');
    Route::get('daftar-bukti-potong/pasal23', 'Ccetak@vDaftarBuktiPotongPasal23');
    Route::get('daftar-bukti-potong/pasal4', 'Ccetak@vDaftarBuktiPotongPasal4');
    Route::post('daftar-bukti-potong/cari-data', 'Ccetak@cariDaftarPotong');
    
    Route::get('spt-masa/pasal22', 'Ccetak@vSptMasaPasal22');
    Route::get('spt-masa/pasal23', 'Ccetak@vSptMasaPasal23');
    Route::get('spt-masa/pasal4', 'Ccetak@vSptMasaPasal4');
    Route::post('spt-masa/cari-data-pasal22', 'Ccetak@cariDataSPT22');
    Route::post('spt-masa/cari-data-pasal23', 'Ccetak@cariDataSPT23');
    Route::post('spt-masa/cari-data-pasal4', 'Ccetak@cariDataSPT4');
});