<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'image',
        'mark',
        'question_type_id',
        'test_id',
    ];
    public  const create_update_rules = [

        'desc' => 'required',
        'mark' => 'required',
        'question_type_id' => 'required',
        'test_id' => 'required',

    ];


    public function test()
    {
        return $this->belongsTo(Test::class,'test_id','id');

    }

    public function questionType()
    {
        return $this->belongsTo(Question_type::class,'question_type_id','id');

    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function student_answer($stud_id)
    {
        return $this->hasOne(Answer::class)->where('student_id', $stud_id)->first();
    }


    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
