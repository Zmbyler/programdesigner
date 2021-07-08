<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProgramChart extends Model
{
    protected $fillable = [
        'user_id',
        'program_id',
        'main_template_id',
        'program_goal_id',
        'template_id',
        'category_id',
        'subcategory_id',
        'exercise_id',
        'tempo',
        'rest',
        'week1',
        'week2',
        'week3',
        'week4',
        'day',
        'sequence',
        'series',
        'frequency',
        'time',
        'sets_reps',
        'comment',
        'status',
    ];

    public function template(){
       return $this->belongsTo('App\ProgramTemplate','template_id');
    }

    public function category(){
       return $this->belongsTo('App\Category','category_id');
    }

    public function subcategory(){
       return $this->belongsTo('App\Category','subcategory_id');
    }

    public function blockfocuscategory(){
        return $this->belongsTo('App\BlockFocusCategory', 'subcategory_id','category_id');
    }
}
