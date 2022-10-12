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

    public function skill_specialities(){
        return $this->hasMany(SkillSpeciality::class);
    }

    public function skill_minimum_rate(){
        return $this->hasOne(SkillMinimumRate::class);
    }

    public function user_skill_scores(){
        return $this->hasMany(UserSkillScore::class);
    }
    

}
