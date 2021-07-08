<?php

use Illuminate\Database\Seeder;
use App\BestDescription;

class BestDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $best_description=[
			['name'=>'Personal Trainer/Fitness Professional'],
			['name'=>'Manager/Owner of Studio/Club'],
			['name'=>'Director/VP of Fitness'],
			['name'=>'Nutritionist/Nutrition Coach'],
			['name'=>'Health Care Practitioner'],
			['name'=>'Lifestyle Coach'],
			['name'=>'Other'],
		];
        BestDescription::insert($best_description);
    }
}
