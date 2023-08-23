<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'homework_id',
        'student_id',
        'mark',
    ];
    public  const create_update_rules = [

        'path' => 'required',
        'homework_id' => 'required',
        'student_id' => 'required',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');

    }

    public function homework()
    {
        return $this->belongsTo(Homework::class,'homework_id','id');

    }

}
