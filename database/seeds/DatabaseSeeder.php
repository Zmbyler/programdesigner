<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\BusinessDescription;
use App\Season;
use App\TemplateType;
use App\ProgramGoal;
use App\BlockfocusTempo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(SeasonSeeder::class);
        // $this->call(SportSeeder::class);
        // $this->call(AthleteProfileSeeder::class);
        // $this->call(TrainingAgeSeeder::class);
        // $this->call(BestDescriptionSeeder::class);
         //$this->call(BlockFocusSeeder::class);
         $this->call(Dayseeder::class);
        // $this->call(BusinessDescriptionSeeder::class);
        // $this->call(ProgramGoalSeeder::class);
        // $this->call(TemplateTypeSeeder::class);
        // $this->call(CountrySeeder::class);

    }
}
