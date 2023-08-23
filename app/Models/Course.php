<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'image',
        'diploma_id',
        'testPercentage',
        'homeworkPercentage',
        'presencePercentage',
        'is_finished',

    ];
   // protected $guarded=[];
    public  const create_update_rules = [

        'title' => 'required',
        'diploma_id' => 'required',
       // 'image'=>'required',
    ];

    public function diploma()
    {
        return $this->belongsTo(Diploma::class,'diploma_id','id');

    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_users','course_id', 'user_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_students','course_id', 'student_id');
    }


    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
    public function homeworks()
    {
        return $this->hasMany(Homework::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }


}
