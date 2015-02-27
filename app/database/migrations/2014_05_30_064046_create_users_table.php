<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function(Blueprint $table) {
                    $table->increments('id');
//                    $table->primary('username');
                    $table->integer('id_pegawai');
                    $table->string('username', 50);
                    $table->string('password', 128);
                    $table->string('jenis_user', 25);
                    $table->string('remember_token', 128);
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
