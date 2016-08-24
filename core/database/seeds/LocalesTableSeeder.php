<?php

use Illuminate\Database\Seeder;

class LocalesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('locales')->delete();
        
		\DB::table('locales')->insert(array (
			0 => 
			array (
				'uuid' => '372c9939-d650-4b7f-9619-c8f0beb62a16',
				'locale_name' => 'english',
				'short_name' => 'en',
				'flag' => '1zkkvvsktknz2epc116hexm8cmflqsrcxg6rtecyohml1isx7q.png',
				'status' => 0,
				'created_at' => '2015-09-29 05:19:27',
				'updated_at' => '2015-09-29 06:04:54',
			),
		));
	}

}
