<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc',
        'student_id',
        'user_id',
        'blog_id',
        'parent_id'
    ];
    public  const create_update_rules = [


        'desc' => 'required',
        'blog_id' => 'required',

    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }
    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }


}
