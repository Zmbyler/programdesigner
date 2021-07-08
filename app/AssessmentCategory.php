<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentCategory extends Model
{
    protected $fillable = ['name','category_option'];

    public function assessmentcatoption(){
	   return $this->hasMany('App\AssessmentCatOption','assessment_category_id')->orderBy('assessment_result_id','ASC');
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
