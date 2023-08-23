<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'date',
        'duration',
        'status',
        'weight',
        'course_id',
        'user_id',
    ];
    public  const create_update_rules = [

        'title' => 'required',
        'date' => 'required',
        'duration' => 'required',
        'course_id' => 'required',
        'user_id' => 'required',

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
        return $this->belongsToMany(Student::class, 'student_tests','test_id', 'student_id')->withPivot('total_mark');
    }


    public function questions()
    {
        return $this->hasMany(Question::class);
    }

}
