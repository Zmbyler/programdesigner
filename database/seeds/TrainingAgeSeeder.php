<?php

use Illuminate\Database\Seeder;
use App\TrainingAge;

class TrainingAgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $training_ages = ['0','1','2','3','4'];
        foreach($training_ages as $training_age)
        {
            TrainingAge::create(['name' => $training_age]);
        }
    }
}
