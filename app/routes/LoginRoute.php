<?php

Route::get('login', array('uses' => 'Clogin@login'));
Route::post('login', array('before' => 'csrf', 'uses' => 'Clogin@login'));
Route::get('logout', array('uses' => 'Clogin@logout'));

