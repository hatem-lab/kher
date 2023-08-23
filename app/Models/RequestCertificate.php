<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCertificate extends Model
{
    use HasFactory;
    protected $table="request_certificate";
    protected $fillable = [
        'status',
        'course_id',
        'student_id',
    ];
//    public  const create_update_rules = [
//
//        'name_en' => 'required',
//        'name_ar' => 'required',
//
//    ];

    public function getTranslatedName()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

}
