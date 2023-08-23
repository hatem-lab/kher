<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'status',
        'user_id',
        'course_id'
    ];
    public  const create_update_rules = [

        'desc' => 'required',
        'title' => 'required',
        'user_id'=> 'required',

    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_surveys','survey_id', 'student_id');
    }

    public function survey_questions()
    {
        return $this->hasMany(SurveyQuestion::class);
    }

}
