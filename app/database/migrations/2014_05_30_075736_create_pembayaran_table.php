<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembayaranTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pembayaran', function(Blueprint $table)
		{
			$table->increments('id_pembayaran', 25);
                        $table->integer('id_pekerjaan');
                        $table->integer('id_pegawai');
                        $table->integer('PersentasePembayaran');
                        $table->double('NilaiPembayaran', 20, 2);
                        $table->integer('NilaiPPh');
                        $table->integer('NilaiPPN');
                        $table->integer('NilaiDasarPengenaan');
                        $table->string('NomorPemotongan', 25);
                        $table->string('noFaktur', 25);
                        $table->text('KetPembayaran');
			$table->dateTime('TanggalPembayaran');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pembayaran');
	}

}
