<?php

use Illuminate\Database\Seeder;
use App\TemplateType;

class TemplateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template_type=[
			['name'=>'Individual Templates'],
			['name'=>'SGPT Templates'],
			['name'=>'Beast U Templates'],
		];
        TemplateType::insert($template_type);
    }
}
