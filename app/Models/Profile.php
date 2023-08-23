<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'image',
        'birthday',
        'user_id',
        'student_id'
    ];
    public  const create_update_rules = [
        'phone' => 'required',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');

    }


    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');

    }



}
