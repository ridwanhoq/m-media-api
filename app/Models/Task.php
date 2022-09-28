<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static $rules = [
        'title_en'  => 'required|string:150',
        'title_bn'  => 'required|string:150'
    ];


}
