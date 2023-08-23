<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'link',
        'image',
    ];

    public  const create_update_rules = [

        'name' => 'required',
        'link' => 'required',

    ];
}
