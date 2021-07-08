<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProgramHeaderDetails extends Model
{
    protected $fillable = [
    	'program_control_id',
    	'user_id',
    	'name',
    	'program_goal',
    	'coach_notes',
        'checkIn',
        'comments',
    	'assessment_category_id',
    ];

    public function assessmentcategory(){
	   return $this->belongsTo('App\AssessmentCategory','assessment_category_id');
    }
}
