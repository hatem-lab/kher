<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'survey_question_id',
    ];


    public  const create_update_rules = [

        'desc' => 'required',
        'survey_question_id' => 'required',

    ];

    public function survetQuestion()
    {
        return $this->belongsTo(SurveyQuestion::class,'survey_question_id','id');

    }


}
