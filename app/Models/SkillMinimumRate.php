<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillMinimumRate extends Model
{
    use HasFactory;

    public function skill(){
        return $this->belongsTo(Skill::class);
    }
    
}
