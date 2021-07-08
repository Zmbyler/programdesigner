<?php

use Illuminate\Database\Seeder;
use App\Sport;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports = [
            ['name'=>'Baseball','icon'=>'baseball'],
            ['name'=>'Volleyball','icon'=>'volleyball'],
            ['name'=>'Basketball','icon'=>'basketball'],
            ['name'=>'Swimming','icon'=>'swim'],
            ['name'=>'Tennis','icon'=>'tennis'],
            ['name'=>'Soccer','icon'=>'soccer'],
            ['name'=>'Hockey','icon'=>'hockey-stick'],
            ['name'=>'Football','icon'=>'football'],
            ['name'=>'Universal','icon'=>'star'],
        ];
        Sport::insert($sports);
         
    }

    
}
