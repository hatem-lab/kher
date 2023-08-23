<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
    ];
    public  const create_update_rules = [

        'type' => 'required',

    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function surveyQuestions()
    {
        return $this->hasMany(SurveyQuestion::class);
    }

}
