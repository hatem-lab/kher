<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['fcm_token', 'fcm_message_en', 'fcm_title_en',
        'fcm_message_ar', 'fcm_title_ar', 'fcm_data',
        'user_type','type', 'user_id', 'student_id', 'status'];

    public  const create_update_rules = [

        'user_type' => 'required',
        'fcm_token' => 'required',

    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

}
