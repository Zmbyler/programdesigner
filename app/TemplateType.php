<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateType extends Model
{
    protected $fillable = ['name'];

    public function programgoal(){
	   return $this->hasMany('App\ProgramGoal','template_type_id');
    }

    public function programtemplate()
    {
    	return $this->hasMany('App\ProgramTemplate','template_type_id');
    }

    public function scopeWithAndWhereHas($query, $relation, $constraint){
	    return $query->whereHas($relation, $constraint)
	        ->with([$relation => $constraint]);
	}


}
