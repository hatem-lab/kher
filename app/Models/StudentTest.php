<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_mark',
        'test_id',
        'student_id',
    ];
    public  const create_update_rules = [

        'test_id' => 'required',
        'student_id' => 'required',
    ];
}
