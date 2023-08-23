<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'path',
        'caption',
    ];
    public  const create_update_rules = [
        'type' => 'required',
        'path' => 'required',

    ];
}
