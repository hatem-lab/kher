<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'about_desc',
        'address',
        'email',
        'video',
        'goals',
        'site_map',
    ];
    public  const create_update_rules = [

    ];
}
