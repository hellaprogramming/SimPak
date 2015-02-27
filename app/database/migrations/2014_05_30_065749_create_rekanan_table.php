<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekananTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rekanan', function(Blueprint $table)
		{
			$table->increments('id_rekanan', 25);
			$table->string('NamaPerusahaan', 50);
                        $table->string('NPWP', 20);
                        $table->string('NamaDirektur', 50);
                        $table->text('Alamat');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rekanan');
	}

}
