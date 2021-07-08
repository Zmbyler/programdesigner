<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactusPage extends Model
{
    protected $fillable = ['name','address','email','phone','short_description','long_description'];
}
