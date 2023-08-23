<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'desc',
        'link',
        'start_date',
        'end_date',
        'course_id',
    ];
    public  const create_update_rules = [

        'title' => 'required',
        'type' => 'required',
        'course_id' => 'required',

    ];


    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'lecture_students','lecture_id', 'student_id');
    }

    public function homework()
    {
        return $this->hasOne(Homework::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

}
