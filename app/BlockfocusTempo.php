<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockfocusTempo extends Model
{
	protected $fillable = ['tempo','block_foci_id','exercise_id'];

    public function exercise(){
	   return $this->belongsTo('App\Exercise','exercise_id');
    }
}
