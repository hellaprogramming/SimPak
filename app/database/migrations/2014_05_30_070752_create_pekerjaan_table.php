<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePekerjaanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pekerjaan', function(Blueprint $table)
		{
			$table->increments('id_pekerjaan', 25);
                        $table->integer('id_rekanan');
                        $table->integer('id_JenisSetoran');
                        $table->string('KategoriPelaksana', 3);
                        $table->string('NamaPekerjaan', 50);
                        $table->double('NilaiKontrak', 20, 2);
                        $table->integer('PersentasePekerjaan');
                        $table->enum('MetodeHitung', array('0', '1'));
			$table->dateTime('tanggalKontrak');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pekerjaan');
	}

}
