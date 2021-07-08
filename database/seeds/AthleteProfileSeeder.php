<?php

use Illuminate\Database\Seeder;
use App\AthleteProfile;

class AthleteProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $athlete_profiles = ['Gorilla','Kangaroo'];
        foreach($athlete_profiles as $athlete_profile)
        {
            AthleteProfile::create(['name' => $athlete_profile]);
        }
    }
}
