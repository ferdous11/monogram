<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 * @return void
	 */
	public function run ()
	{
		$setting = new \App\Setting();
		$setting->supervisor_station = 'S-SUP';
		$setting->save();
	}
}
