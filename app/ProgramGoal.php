<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramGoal extends Model
{
	protected $fillable = [
        'name',
        'icon',
        'slug',
        'template_type_id',
    ];
    public function goaltemplate()
    {
    	return $this->hasMany('App\ProgramTemplate','program_goal_id');
    }
}
