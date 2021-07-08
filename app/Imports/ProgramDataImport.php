<?php

namespace App\Imports;

use App\Program;
//use App\ProgramTemplate;
use App\Category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class ProgramDataImport implements ToCollection, WithStartRow
{


    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
        //dd($rows);
    	// $program_template = ProgramTemplate::create([
     //        'name' => $this->template_name,
     //        'template_type_id' => $this->main_template_id,
     //        'program_goal_id' => $this->program_goal_id,
     //        'user_id' => Auth::user()->id,
     //    ]);
        return $rows[0];
    	// foreach ($rows as $row) 
     //    {
     //        $category_id = Category::where('name',$row[0])->value('id');
     //        $subcategory_id = Category::where('name',$row[1])->value('id');
     //    	$program = Program::create([
	    //         'main_template_id'  => $this->main_template_id,
	    //         'program_goal_id' 	=> $this->program_goal_id,
	    //         'template_id' 		=> $this->template_id,
     //            //'template_id'       => $program_template->id,
     //            'category_id'       => $category_id,
     //            'subcategory_id'    => $subcategory_id,
     //            'season_id'         => $this->season_id,
     //            'sport_id'          => $this->sport_id,
	    //         'tempo'             => $row[2],
	    //         'rest'              => $row[3],
	    //         'week1'             => $row[4],
	    //         'week2'             => $row[5],
	    //         'week3'             => $row[6],
	    //         'week4'             => $row[7],
	    //         'day'               => $row[8],
	    //         'sequence'          => $row[9],
	    //         'frequency'         => $row[10],
	    //         'time'              => $row[11],
	    //         'sets_reps'         => $row[12],
	    //         'comment'           => $row[13],
	    //     ]);
           
     //    //$program->category()->sync($this->category_id);
     //    }
    }
}