<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramAssessment extends Model
{
    protected $fillable = [
        'program_detail_id',
        'assessment_result_id',
        'slug',
        'option',
    ];
}
