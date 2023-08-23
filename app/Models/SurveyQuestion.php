<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'question_type_id',
        'survey_id',
    ];
    public  const create_update_rules = [

        'desc' => 'required',
        'question_type_id' => 'required',
        'survey_id' => 'required',

    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class,'survey_id','id');

    }

    public function questionType()
    {
        return $this->belongsTo(Question_type::class,'question_type_id','id');

    }

    public function survey_student_answer($stud_id)
    {
        return $this->hasOne(SurveyAnswer::class)->where('student_id', $stud_id)->first();
    }

    public function SurveyAnswers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }

    public function SurveyOptions()
    {
        return $this->hasMany(SurveyOption::class);
    }

}
