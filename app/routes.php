<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */
Blade::extend(function ($value) {
    return preg_replace('/\{\?(.+)\?\}/', '<?php ${1} ?>', $value);
});

/*
 * 
 * Route Sistem Penghitungan Pajak dan pelaporan atas pengadaan barang dan jasa Dinas PU Kutai Timur
 * author Randa Wahyu Pradhana
 * email : randaw46.rw@gmail.com
 * 
 */

Route::get('/', function() {
            return Redirect::to('login');;
        });

require_once('routes/LoginRoute.php');
require_once('routes/AdminRoute.php');
require_once('routes/BendaharaPengeluaranRoute.php');
require_once('routes/UserRoute.php');
require_once('routes/BendaharaRoute.php');
require_once('routes/RekananRoute.php');
require_once('routes/PekerjaanRoute.php');
require_once('routes/PembayaranRoute.php');
require_once('routes/CetakRoute.php');
require_once('routes/VCetakRoute.php');

Route::get('beranda', array('before' => 'auth', function() {
        return View::make('v_beranda');
    }));

Route::group(array('before' => 'auth'), function () {
   Route::get('informasi-pajak', function(){
       $data = Informasipajak::all();
       return View::make('v_informasi_pajak')->with('data', $data);
   });
    
});


