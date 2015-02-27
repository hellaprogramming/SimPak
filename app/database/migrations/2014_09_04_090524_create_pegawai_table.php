<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pegawai', function(Blueprint $table)
		{
			$table->increments('id_pegawai', 10);
			$table->string('Nama', 25);
                        $table->string('Npwp', 20);
                        $table->string('NpwpDinas', 20);
                        $table->string('NIP', 20);
                        $table->text('Alamat');
                        $table->string('Telepon', 20);
                        $table->string('Email', 30);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pegawai');
	}

}
