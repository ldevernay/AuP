<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LanguageTableSeeder extends Seeder {

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

	public function run()
	{
		DB::table('languages')->delete();

			$date = $this->randDate();
			DB::table('languages')->insert([
				'name' => 'HTML/CSS',
				'created_at' => $date,
				'updated_at' => $date
			]);
			DB::table('languages')->insert([
				'name' => 'Javascript',
				'created_at' => $date,
				'updated_at' => $date
			]);
			DB::table('languages')->insert([
				'name' => 'PHP',
				'created_at' => $date,
				'updated_at' => $date
			]);
			DB::table('languages')->insert([
				'name' => 'Ruby',
				'created_at' => $date,
				'updated_at' => $date
			]);
			DB::table('languages')->insert([
				'name' => 'Python',
				'created_at' => $date,
				'updated_at' => $date
			]);
		}
}
