<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenispajakTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jenispajak', function(Blueprint $table)
		{
			$table->increments('KodeJenisPajak', 11);
                        $table->string('NamaPajak', 25);
                        $table->integer('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('jenispajak');
	}

}
