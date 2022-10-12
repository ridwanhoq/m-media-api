<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSpeciality extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $rules = [
        "title"         => "required",
        "description"   => "nullable"
    ];

    public function skill(){
        return $this->belongsTo(Skill::class);
    }

    public function skill_sub_specialities(){
        return $this->hasMany(SkillSubSpeciality::class);
    }



}
