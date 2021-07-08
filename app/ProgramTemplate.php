<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramTemplate extends Model
{
    protected $fillable = [
        'name',
        'template_type_id',
        'program_goal_id',
        'user_id',
        'day_id',
        'status',
        'added_by'
    ];

    public function templatetype()
    {
    	return $this->belongsTo('App\TemplateType','template_type_id');
    }

    public function programgoal()
    {
    	return $this->belongsTo('App\ProgramGoal','program_goal_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }

    public function day()
    {
        return $this->belongsTo('App\Days','day_id');
    }
}
