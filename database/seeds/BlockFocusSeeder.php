<?php

use Illuminate\Database\Seeder;
use App\BlockFocus;

class BlockFocusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $block_focus = [
			['name'=>'Conditioning','slug'=>'accumulation'],
			['name'=>'Strength','slug'=>'intensification'],
			['name'=>'Power','slug'=>'realization']
		];
		BlockFocus::insert($block_focus);
    }
}
