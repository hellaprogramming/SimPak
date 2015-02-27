<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenissetoranTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jenissetoran', function(Blueprint $table)
		{
			$table->increments('id_JenisSetoran', 11);
                        $table->integer('KodeJenisPajak');
                        $table->string('NamaSetoran', 80);
                        $table->integer('KodeJenisSetoran');
                        $table->double('Tarif', 3, 3);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jenissetoran');
	}

}
