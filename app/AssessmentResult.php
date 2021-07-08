<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{
	use HasSlug;

	public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->usingSeparator('_');
    }

    protected $fillable = ['name','slug','assessment_option_one','assessment_option_two','user_id','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
