<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    protected $table = 'homework';


    protected $fillable = [
        'title',
        'desc',
        'user_id',
        'lecture_id',
        'button',
    ];
    public  const create_update_rules = [

        'title' => 'required',
        'user_id' => 'required',
        'lecture_id'=> 'required',

    ];


    public function students()
    {
        return $this->belongsToMany(Student::class, 'homework_students');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class,'lecture_id','id');
    }

    public function course()
    {
        return $this->belongsTo(Lecture::class,'course_id','id');
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }


    public function studentFiles()
    {
        return $this->hasMany(StudentFile::class);
    }


}
