<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'user_id',
        'country_id',
        'city',
        'time_zone',
        'business_descriptions_id',
        'business_phoneno',
        'business_other_details',
        'best_descriptions_id',
        'best_other_details'
    ];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function bestdesc()
    {
        return $this->belongsTo('App\BestDescription','best_descriptions_id');
    }

    public function businessdesc()
    {
        return $this->belongsTo('App\BusinessDescription','business_descriptions_id');
    }
}
