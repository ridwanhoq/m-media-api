<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $rules = [
        'title' => 'required|unique:skills'
    ];

    

}
