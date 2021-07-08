<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProgramDetails extends Model
{
    protected $fillable = [
        'user_id',
        'program_id',
        'aslr_left',
        'template',
        'toe_touch',
        'toe_touch_to_squat',
        'traiining_age',
        'traiining_block',
        'type',
        'athlete_type',
        'what_based',
        'what_season',
        'program_goal',
        'assessment_option',
        'program_template',
        'assessment_category_id',
        'day_id',
    ];

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function programassessment()
    {
        return $this->hasMany('App\ProgramAssessment','program_detail_id')->orderBy('id','DESC');
    }

    
}
