<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'whats_phone',
        'mobile_phones',
        'land_phones',
        'email',
        'whats_link',
        'insta_link',
        'facebook_link',
        'twitter_link',
        'linkedin_link',
        'telegram_link',
    ];
    public  const create_update_rules = [

    ];
}
