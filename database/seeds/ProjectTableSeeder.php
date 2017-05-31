<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectTableSeeder extends Seeder {

    private function randDate()
	{
		return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
	}

	public function run()
	{
		DB::table('projects')->delete();

		for($i = 0; $i < 100; ++$i)
		{
			$date = $this->randDate();
			DB::table('projects')->insert([
				'name' => 'Projet' . $i,
				'pitch' => 'Pitch' . $i,
				'github' => 'https://github.com/ldevernay/AuP',
        'user_id' => rand(1, 10),
				'created_at' => $date,
				'updated_at' => $date
			]);
		}
	}
}