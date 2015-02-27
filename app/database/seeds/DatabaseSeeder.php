<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('TableSeeder');
                $this->call('JenisPajakSeeder');
                $this->call('UsersSeeder');
                $this->call('RekananSeeder');
	}

}
