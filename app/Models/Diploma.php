<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_en',
        'desc',
        'image',

    ];
    public  const create_update_rules = [

        'title' => 'required',
        'title_en' => 'required',



    ];


}
