<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'bool',
        'options',
        'mark',
        'student_id',
        'question_id',
    ];
    public  const create_update_rules = [


        'student_id' => 'required',
        'question_id' => 'required',

    ];

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id','id');

    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');

    }



}
