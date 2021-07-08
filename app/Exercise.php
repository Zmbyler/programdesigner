<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name',
        'training_age_id',
        'athlete_profile_id',
        'block_focus_id',
        'status',
        'assessment_category_id'
    ];

    // public function category(){
    // 	return $this->hasOne('App\Category','id','category_id');
    // }

    public function trainingage(){
    	return $this->hasOne('App\TrainingAge','id','training_age_id');
    }

    public function athleteoption(){
        return $this->hasOne('App\AthleteProfile','id','athlete_profile_id');
    }

    public function blockfocus(){
        return $this->hasOne('App\BlockFocus','id','block_focus_id');
    }

    public function subcategory(){
    	return $this->hasOne('App\Category','id','subcategory_id');
    }

    public function categories() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function category(){
        return $this->belongsToMany('App\Category');
    }
    
}
