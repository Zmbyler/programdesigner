<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentCatOption extends Model
{
	protected $fillable = ['assessment_category_id','assessment_result_id','option_value'];

    public function assessmentresult(){
	   return $this->belongsTo('App\AssessmentResult','assessment_result_id');
    }
}
