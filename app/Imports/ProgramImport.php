<?php

namespace App\Imports;

use App\Program;
use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProgramImport implements ToModel, WithValidation
{
    // public function  __construct($main_template_id,$program_goal_id,$template_id,$season_id=null)
    // {
    //     $this->main_template_id = $main_template_id;
    //     $this->program_goal_id = $program_goal_id;
    //     $this->template_id = $template_id;
    //     $this->season_id = $season_id;
    //     //$this->sport_id = $sport_id;
    // }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    

    // public function customValidationMessages()
    // {
    //     return [
    //         '0.required' => 'Correo ya esta en uso.',
    //         '2.required' => 'Correo ya esta en uso.',
    //     ];
    // }

    public function model(array $row)
    {
        //return $row;
        // $category_id = Category::where('name',$row['category'])->value('id');
        // $subcategory_id = Category::where('name',$row['subcategory'])->value('id');
        // return new Program([
        //     'main_template_id' => $this->main_template_id,
        //     'program_goal_id' => $this->program_goal_id,
        //     'template_id' => $this->template_id,
        //     'category_id'       => $category_id,
        //     'subcategory_id'    => $subcategory_id,
        //     'season_id'         => $this->season_id,
        //     //'sport_id'          => $this->sport_id,
        //     'tempo'     => $row['tempo'],
        //     'rest'     => $row['rest'],
        //     'week1'     => $row['week1'],
        //     'week2'     => $row['week2'],
        //     'week3'     => $row['week3'],
        //     'week4'     => $row['week4'],
        //     'day'     => $row['day'],
        //     'sequence'     => $row['sequence'],
        //     'series'     => $row['series'],
        //     'frequency'     => $row['frequency'],
        //     'time'     => $row['time'],
        //     'sets_reps'     => $row['sets_reps'],
        //     'comment'     => $row['comment'],
        // ]);
    }

    
}
