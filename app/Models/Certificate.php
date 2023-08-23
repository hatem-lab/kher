<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
    ];
    public  const create_update_rules = [

        'name_en' => 'required',
        'name_ar' => 'required',

    ];

    public function getTranslatedName()
    {
        return $this->{'name_' . app()->getLocale()};
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }


}
