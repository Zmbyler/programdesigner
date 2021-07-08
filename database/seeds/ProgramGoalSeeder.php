<?php

use Illuminate\Database\Seeder;
use App\ProgramGoal;

class ProgramGoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$program_goal = [
			//['name'=>'Weight Loss','template_type_id'=>1,'icon'=>'healthy ','slug'=>'weight_loss'],
            ['name'=>'Weight Loss','template_type_id'=>1,'icon'=>'fatloss ','slug'=>'weight_loss'],
            //['name'=>'Weight Loss','template_type_id'=>1,'icon'=>'fire ','slug'=>'weight_loss'],
			['name'=>'Strength','template_type_id'=>1,'icon'=>'strength','slug'=>'strength'],
			['name'=>'Muscle','template_type_id'=>1,'icon'=>'arm','slug'=>'muscle'],
		];
        ProgramGoal::insert($program_goal);
    }
}
