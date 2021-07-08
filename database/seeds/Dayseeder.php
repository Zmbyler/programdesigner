<?php

use Illuminate\Database\Seeder;
use App\Days;

class Dayseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $days = [
            ['name'=>'1 Day Programs','slug'=>'1_day_programs'],
            ['name'=>'2 Day Programs','slug'=>'2_day_programs'],
            ['name'=>'2 Day Rotation Programs','slug'=>'2_day_rotation_programs'],
            ['name'=>'3 Day Programs','slug'=>'3_day_programs'],
            ['name'=>'4 Day Programs','slug'=>'4_day_programs'],
            ['name'=>'5 Day Programs','slug'=>'5_day_programs'],
            
        ];
        Days::insert($days);
    }
}
