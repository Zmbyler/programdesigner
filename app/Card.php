<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['user_id','stripe_customer_id','stripe_token_id','brand','last4','exp_month','exp_year'];
}
