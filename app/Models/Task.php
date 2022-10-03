<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $rules = [
        "title"  => "required|string:150|unique:tasks",
    ];

    public static function fields() {
        return  [
            "title",             
            "description",       
            "hours_to_finish",
            "minutes_to_finish",
            "positions",
            "rate"   
        ];
    }
        
    


}
