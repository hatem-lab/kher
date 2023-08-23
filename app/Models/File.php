<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'path',
        'homework_id',
        'lecture_id',
    ];
    public  const create_update_rules = [

        'file' => 'required',
        'name' => 'required',

    ];

    public function lecture()
    {
        return $this->belongsTo(Lecture::class,'lecture_id','id');

    }

    public function homework()
    {
        return $this->belongsTo(Homework::class,'homework_id','id');

    }
}
