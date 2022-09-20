<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $rules = [
        'title_en'  => 'required|string:150',
        'title_bn'  => 'required|string:150'
    ];

}
