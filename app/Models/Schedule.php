<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'lecture_id',
        'student_id',
        'user_id',
    ];
    public  const create_update_rules = [
        'start_date' => 'required',
        'end_date' => 'required',
        'lecture_id' => 'required',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class,'lecture_id','id');
    }
}
