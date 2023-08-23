<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'bool',
        'options',
        'student_id',
        'survey_question_id',
    ];
    public  const create_update_rules = [


        'student_id' => 'required',
        'survey_question_id' => 'required',

    ];

    public function SurveyQuestion()
    {
        return $this->belongsTo(SurveyQuestion::class,'question_id','id');

    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');

    }

}
