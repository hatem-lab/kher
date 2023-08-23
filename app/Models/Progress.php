<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $table = 'progress';

    protected $fillable = [
        'mark',
        'pass_status',
        'student_id',
        'course_id',
    ];
    public  const create_update_rules = [

        'mark' => 'required',
        'pass_status' => 'required',
        'student_id' => 'required',
        'course_id' => 'required',

    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');

    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');

    }
}
