<?php

use Illuminate\Database\Seeder;
use App\BusinessDescription;

class BusinessDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $business_description =[
			['name'=>'Independent Fitness Professional'],
			['name'=>'Club/Studio 1-4 locations'],
			['name'=>'Club/Studio 5+ locations'],
			['name'=>'Programming Service Provider'],
			['name'=>'Corporate Wellness Vendor'],
			['name'=>'Health Care/Integrative Health'],
			['name'=>'Other']
		];

		BusinessDescription::insert($business_description);
    }
}
