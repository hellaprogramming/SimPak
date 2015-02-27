<?php
Route::group(array('before' => 'auth|bendahara.pembantu'), function () {
    Route::get('profil/rekanan', 'Crekanan@index');
    Route::post('profil/tambah-rekanan', 'Crekanan@TambahRekanan');
    Route::get('profil/data-ubah-rekanan/{id}', function($id) {
                $objek = DB::table('Rekanan')->where('id_rekanan', $id)->first();
                return View::make('v_rekanan_edit')->with('datas', $objek);
            });
    Route::post('profil/update-rekanan', 'Crekanan@EditRekanan');
    Route::post('profil/delete-rekanan/{id}', 'Crekanan@HapusRekanan');
});
