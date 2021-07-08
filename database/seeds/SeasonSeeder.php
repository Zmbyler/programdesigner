<?php

use Illuminate\Database\Seeder;
use App\Season;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = 
            ['name'=>'In-Season','icon'=>'stadium'],
            ['name'=>'Off-Season','icon'=>'stadium'],
            ['name'=>'Post-Season','icon'=>'stadium'],
        ];
        Season::insert($season);
        
    }
}
