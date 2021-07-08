<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramTemplatePdf extends Model
{
    protected $fillable = [
    	'user_id',
    	'program_controls_id',
    	'email',
    	'notes',
    	'pdf',
    ];
}
