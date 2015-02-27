<?php
Route::group(array('before' => 'auth|bendahara.pembantu'), function () {
    
    Route::get('cetak/pasal22', 'Ccetak@indexPasal22');
    Route::get('cetak/pasal23', 'Ccetak@indexPasal23');
    Route::get('cetak/pasal4', 'Ccetak@indexPasal4');
    
});