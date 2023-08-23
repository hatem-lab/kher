<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSurvey extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'student_id',
    ];
    public  const create_update_rules = [

        'survey_id' => 'required',
        'student_id' => 'required',
    ];
}
