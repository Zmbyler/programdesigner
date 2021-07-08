<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramControl extends Model
{
    protected $fillable = [
        'user_id',
        'block_focus',
        'athlete_profile',
        'season',
        'sport',
        'assessment_category_id',
        'training_level',
        'program_template',
        'program_goal',
        'days',
        'program_name'
    ];

    public function userProgramChartData()
    {
    	return $this->hasMany('App\UserProgramChart','program_id');
    }
}
