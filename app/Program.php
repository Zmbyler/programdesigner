<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Category;

class Program extends Model
{
    protected $fillable = [
        'main_template_id', 
        'program_goal_id',
        'template_id',
        'category_id',
        //'exercise_id',
        'subcategory_id',
        'sport_id',
        'season_id',
        'traning_block',
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
        'status'
    ];

    

    public function scopeWithAndWhereHas($query, $relation, $constraint){
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
    
    public function subexercise() 
    {

        return $this->hasManyThrough('App\Exercise', 'App\Category', 'parent_id', 'category_id', 'category_id');
    }

    public function template()
    {
        return $this->belongsTo('App\ProgramTemplate', 'template_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function blockfocuscategory()
    {
        return $this->belongsTo('App\BlockFocusCategory', 'subcategory_id','category_id');
    }

    public function subcategory()
    {
        //return $this->category_id;
        
        return $this->belongsTo('App\Category', 'subcategory_id' );
       
        
    }

    public function season()
    {
        return $this->belongsTo('App\Season', 'season_id');
    }

    public function sport()
    {
        return $this->belongsTo('App\Sport', 'sport_id');
    }

    // public function category()
    // {
    //     return $this->belongsToMany('App\Category');
    // }
}
