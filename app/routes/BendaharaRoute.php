<?php

Route::group(array('before' => 'auth|bendahara.pembantu'), function () {
    Route::get('profil/bendahara', array('uses' => 'Cbendahara@index'));
    Route::get('profil/edit-bendahara/{id}', function($id) {
                $objek = Pegawai::where('id_pegawai', $id)->first();
                return View::make('v_bendahara_edit')->with('datas', $objek);
            });
    Route::post('profil/update-bendahara', 'Cbendahara@EditBendahara');
});