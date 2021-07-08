<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockFocusCategory extends Model
{
	protected $fillable = ['block_focus_id','category_id','tempo','rep','kangaroo_vbt','gorilla_vbt'];

	public function category(){
	   return $this->belongsTo('App\Category');
    }

    public function blockfocus(){
	   return $this->belongsTo('App\BlockFocus','block_focus_id');
    }
}
