<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSubSpeciality extends Model
{
    use HasFactory;

    public function skill_speciality(){
        return $this->belongsTo(SkillSpeciality::class);    
    }
}
